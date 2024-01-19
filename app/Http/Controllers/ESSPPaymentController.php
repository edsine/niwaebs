<?php

namespace App\Http\Controllers;


use view;

use Response;
use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Modules\EmployerManager\Models\Payment;




class ESSPPaymentController extends AppBaseController
{

    public function index()
    {

        $payments = Payment::paginate(10);
        return view('payments', compact('payments'));
    }

    public function approvePayment($id)
    {
        // Find the payment by ID
        $payment = Payment::findOrFail($id);

        // Update the payment status or perform any other necessary actions
        $payment->update(['approval_status' => 1]); // Assuming '1' represents the approved status

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment approved successfully');
    }


    public function generateRemita(Request $request, $amount, $serviceApplication)
    {
        //validation only for ECS payments
        // $request->validate([
        //     'year' => 'required_with:contribution_period',
        //     'number_of_months' => 'required_if:contribution_period,Monthly|numeric',
        //     'contribution_period' => 'required_with:year|string',
        //     'payment_type' => 'required|numeric',
        //     'employees' => 'required_with:year,contribution_period',
        //     'letter_of_intent' => 'file|mimes:pdf|max:2048',
        // ]);

        //generate invoice number
        $lastInvoice = Payment::get()->last();
        if ($lastInvoice) {
            $idd = str_replace("NIWA-", "", $lastInvoice['invoice_number']);
            $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
            $lastInvoice = 'NIWA-' . $id;
        } else {
            $lastInvoice = "NIWA-0000001";
        }

        //$serviceTypeId = $request->payment_type ==  1 ? env('ECS_REGISTRATION') : ($request->payment_type == 4 ? env('ECS_CONTRIBUTION') : env('ECS_CERTIFICATE'));
        $serviceTypeId = "4430731";
        $orderId = round(microtime(true) * 1000);
        $apiHash = hash('sha512', env('REMITA_MERCHANT_ID') . $serviceTypeId . $orderId . $amount . env('REMITA_API_KEY'));

        $fields = [
            "serviceTypeId" => $serviceTypeId,
            "amount" => $amount,
            "orderId" => $orderId,
            "payerName" => $serviceApplication->employer()->company_name,
            "payerEmail" => $serviceApplication->employer()->company_email,
            "payerPhone" => $serviceApplication->employer()->company_phone,
            "description" => enum_payment_types()[$request->payment_type],
            "customFields" => [
                [
                    "name" => 'Invoice Number',
                    "value" => $lastInvoice,
                    "type" => "ALL",
                ],
                [
                    "name" => 'NIWA Order ID',
                    "value" => auth()->user()->ecs_number,
                    "type" => "ALL",
                ],
                [
                    "name" => 'Payment type',
                    "value" => $request->payment_type,
                    "type" => "ALL",
                ],
            ],
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('REMITA_BASE_URL') . '/echannelsvc/merchant/api/paymentinit',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: remitaConsumerKey=' . env('REMITA_MERCHANT_ID') . ',remitaConsumerToken=' . $apiHash
            ),
        ));

        $result = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Flash::error($err);
            return redirect()->back();
        }

        $result = substr($result, 7);
        $newLength = strlen($result);
        $result = substr($result, 0, $newLength - 1);
        $data = json_decode($result, true);
        //dd($orderId);
        // dd($fields);
        // exit();
        if ($data['statuscode'] == "025" && $data['RRR']) {
            //add record to transactions table

            $payment = Payment::create([
                'payment_type' => $request->payment_type,
                'payment_employee' => $request->employees,
                'rrr' => $data['RRR'],
                'invoice_number' => $lastInvoice,
                'invoice_generated_at' => date('Y-m-d H:i:s'),
                'invoice_duration' => date('Y-m-d', strtotime('+1 year')),
                'payment_status' => 0,
                'amount' => $amount,
                'service_id' => $request->service_id ?? null,
                'letter_of_intent' => $path1 ?? null,
                //below for ECS payments
                'service_type_id' => $request->service_type_id ?? null,
                'contribution_year' => $request->year ?? null,
                'contribution_period' => $request->contribution_period ?? null,
                'contribution_months' => $request->number_of_months ?? null,
                'employees' => $request->employees,
                'service_application_id' => $serviceApplication->id,
                'employer_id' => $serviceApplication->employer()->id
            ]);

            $serviceApplication->current_step = 1;
            $serviceApplication->status_summary = "Payment of equipment fees required, Invoice has been sent to you";
            $serviceApplication->save();



            Flash::success('Payment Reference Generated! RRR = ' . $data['RRR']);
        } else {
            Flash::error('Problems encountered in generating RRR');
        }
    }
}
