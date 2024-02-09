<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use App\Models\EquipmentAndFee;
use App\Models\ServiceApplication;
use App\Models\ServiceApplicationDocument;
use App\Http\Controllers\AppBaseController;
use Modules\EmployerManager\Models\Payment;
use App\Http\Controllers\ESSPPaymentController;
use App\Repositories\ServiceApplicationRepository;
use App\Http\Requests\CreateServiceApplicationRequest;
use App\Http\Requests\UpdateServiceApplicationRequest;

class ServiceApplicationController extends AppBaseController
{
    /** @var ServiceApplicationRepository $serviceApplicationRepository*/
    private $serviceApplicationRepository;

    public function __construct(ServiceApplicationRepository $serviceApplicationRepo)
    {
        $this->serviceApplicationRepository = $serviceApplicationRepo;
    }

    /**
     * Display a listing of the ServiceApplication.
     */
    public function index(Request $request)
    {
        // $serviceApplications = $this->serviceApplicationRepository->paginate(10);

        $serviceApplications = ServiceApplication::where('current_step', '>', 4)->paginate(10);

        return view('service_applications.index')
            ->with('serviceApplications', $serviceApplications);
    }

    /**
     * Show the form for creating a new ServiceApplication.
     */
    public function create()
    {
        return view('service_applications.create');
    }

    /**
     * Store a newly created ServiceApplication in storage.
     */
    public function store(CreateServiceApplicationRequest $request)
    {
        $input = $request->all();

        $serviceApplication = $this->serviceApplicationRepository->create($input);

        Flash::success('Service Application saved successfully.');

        return redirect(route('serviceApplications.index'));
    }

    /**
     * Display the specified ServiceApplication.
     */
    public function show($id)
    {
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceApplications.index'));
        }

        $payments = Payment::where('service_application_id', $serviceApplication->id)->paginate(10);
        $documents = $serviceApplication->documents()->paginate(10);
        $equipment_and_fees = EquipmentAndFee::pluck('name', 'price');

        return view('service_applications.show', compact('payments', 'documents', 'equipment_and_fees'))->with('serviceApplication', $serviceApplication);
    }

    /**
     * Show the form for editing the specified ServiceApplication.
     */
    public function edit($id)
    {
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceApplications.index'));
        }

        return view('service_applications.edit')->with('serviceApplication', $serviceApplication);
    }

    /**
     * Update the specified ServiceApplication in storage.
     */
    public function update($id, UpdateServiceApplicationRequest $request)
    {
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceApplications.index'));
        }

        $serviceApplication = $this->serviceApplicationRepository->update($request->all(), $id);

        Flash::success('Service Application updated successfully.');

        return redirect(route('serviceApplications.index'));
    }

    public function approveOrDeclineDocument($id)
    {
        $document = ServiceApplicationDocument::find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect()->back();
        }

        $approval_status = $document->approval_status;
        if ($approval_status) {
            $document->approval_status = 0;
            Flash::success('Document has been declined');
        } else {
            $document->approval_status = 1;
            Flash::success('Document has been approved');
        }

        $document->save();


        return redirect()->back();
    }

    public function approveDocuments(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect()->back();
        }

        $selected_status = $request->input('selected_status');


        if ($selected_status == 'decline') {
            $serviceApplication->mse_are_documents_verified = 0;
            $serviceApplication->current_step = 3;
            Flash::success('Documents have been declined. Wait for client to update documents before approval will show');
        } else if ($selected_status == 'approve') {
            $serviceApplication->mse_are_documents_verified = 1;
            $unapproved_documents_count = ServiceApplicationDocument::where('service_application_id', $serviceApplication->id)->where('approval_status', '!=', 1)->count();

            if ($unapproved_documents_count > 0) {
                Flash::error('Please approve each document first');

                return redirect()->back();
            }
            $serviceApplication->current_step = 6;
            Flash::success('Documents have been approved');
        }

        $serviceApplication->mse_document_verification_comment = $request->mse_document_verification_comment;
        $serviceApplication->save();


        return redirect()->back();
    }

    public function approveProcessingFee(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->finance_is_processing_fee_verified = 0;
            $serviceApplication->status_summary = 'Inspection fee has been declined';
            Flash::success('Payment has been declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->finance_is_processing_fee_verified = 1;
            $serviceApplication->current_step = 7;
            $serviceApplication->status_summary = 'An inspection notice has been sent to your mail';
            $serviceApplication->date_of_inspection = $request->date_of_inspection;
            Flash::success('Payment has been approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }

    public function approveInspectionFee(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->finance_is_inspection_fee_verified = 0;
            $serviceApplication->status_summary = 'Inspection fee has been declined';
            Flash::success('Payment has been declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->finance_is_inspection_fee_verified = 1;
            $serviceApplication->current_step = 9;
            $serviceApplication->status_summary = 'Inspection fee has been approved';
            Flash::success('Payment has been approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }


    public function setInspectionStatus(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->inspection_status = 0;
            $serviceApplication->status_summary = 'Inspection status: Declined';
            Flash::success('Inspection status: Declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->inspection_status = 1;
            $serviceApplication->current_step = 10;
            $serviceApplication->status_summary = 'Inspection status: Approved';
            Flash::success('Inspection status: Approved');
        }

        $serviceApplication->comments_on_inspection = $request->comments_on_inspection;
        $serviceApplication->save();

        return redirect()->back();
    }

    public function generateEquipmentInvoice(Request $request, $id)
    {

        $sum_total = 0;
        $equipment = $request->input('equipment');


        foreach ($equipment as $key => $value) {
            $price = (int)$value['price'] ?? 0;
            $quantity = (int)$value['qty'] ?? 0;

            $total = $price * $quantity;
            $sum_total += $total;
        }


        $serviceApplication = ServiceApplication::find($id);
        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        $input = $request->all();

        $essp_payment = (new ESSPPaymentController)->generateRemita($request, $sum_total, $serviceApplication);

        if ($essp_payment == true) {
            if ($input['payment_type'] == "5") {
                $serviceApplication->current_step = 11;
                $serviceApplication->status_summary = "Payment of equipment fees required, Invoice has been sent to you";
                $serviceApplication->equipment_fees_list = $equipment;
                $serviceApplication->save();
            }
        }

        return redirect()->back();
    }

    public function approveEquipmentFee(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->are_equipment_and_monitoring_fees_verified = 0;
            $serviceApplication->status_summary = 'Equipment fee has been declined';
            Flash::success('Payment has been declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->are_equipment_and_monitoring_fees_verified = 1;
            $serviceApplication->current_step = 13;
            $serviceApplication->status_summary = 'Equipment fee has been approved';
            Flash::success('Payment has been approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }

    public function areaOfficerApproval(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->area_officer_approval = 0;
            $serviceApplication->current_step = 10;
            $serviceApplication->status_summary = 'Declined by Area officer';
            Flash::success('Declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->area_officer_approval = 1;
            $serviceApplication->current_step = 14;
            $serviceApplication->status_summary = 'Approved by Area officer';
            Flash::success('Approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }

    public function hodMarineApproval(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->hod_marine_approval = 0;
            $serviceApplication->current_step = 12;
            $serviceApplication->status_summary = 'Declined by HOD Marine';
            Flash::success('Declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->hod_marine_approval = 1;
            $serviceApplication->current_step = 15;
            $serviceApplication->issued_on = now();
            $serviceApplication->status_summary = 'Approved by HOD Marine';
            Flash::success('Approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }


    /**
     * Remove the specified ServiceApplication from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceApplications.index'));
        }

        $this->serviceApplicationRepository->delete($id);

        Flash::success('Service Application deleted successfully.');

        return redirect(route('serviceApplications.index'));
    }

    public function showMap($id)
{
    $serviceApplication = ServiceApplication::find($id);
    if (!$serviceApplication) {
        return abort(404); // or handle the case where the service application is not found
    }

    return view('service_applications.map', compact('serviceApplication'));
}
}
