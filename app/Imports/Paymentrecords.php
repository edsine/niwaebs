<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class Paymentrecords implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
          $records=[

            'employer_id'=>$collection[0],
            'payment_type'=>$collection[1],
            'rrr'=>$collection[2],
            'invoice_number'=>$collection[3],
            'invoice_generated_at'=>$collection[4],
            'invoice_duration'=>$collection[5],
            'payment_status'=>$collection[6],
            'amount'=>$collection[7],
            'approval_status'=>$collection[8],
            'paid_at'=>$collection[9],
            'transaction_id'=>$collection[10],
            'service_id'=>$collection[11],
            'sub_service_id'=>$collection[12],
            'service_type_id'=>$collection[13],
            'service_application_id'=>$collection[14],
            'branch_id'=>$collection[15],
          ];

          DB::table('payments')->insert($records);
    }
}
