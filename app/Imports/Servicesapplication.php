<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class Servicesapplication implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        $skippedFirstRow = false;
        //
        foreach ($collection as $row) {

            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }

            // dd(Carbon::createFromTimestamp(($row[2] - 25569) * 86400)->toDateTimeString());
           
            $records = [
                'service_id' => $row[0],
                'application_form_payment_status' => $row[1],
                // 'date_of_inspection' =>Carbon::createFromTimestamp(($row[2] - 25569) * 86400)->toDateTimeString(), //op
                'service_type_id' => $row[3],
                'current_step' => intval($row[4]),
                'user_id' => $row[5],
                'mse_are_documents_verified' => $row[6],
                'finance_is_application_fee_verified' => $row[7],
                'finance_is_processing_fee_verified' => $row[8],
                'finance_is_inspection_fee_verified' => $row[9],
                'inspection_status' => $row[10],
                'are_equipment_and_monitoring_fees_verified' => $row[11],
                'area_officer_approval' => $row[12],
                'hod_marine_approval' => $row[13],
               
            ];

            DB::table('service_applications')->insert($records);
        }
    }
}
