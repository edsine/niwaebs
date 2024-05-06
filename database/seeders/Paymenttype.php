<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Paymenttype extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Application Form'],
            ['name' => 'Processing Fee'],
            ['name' => 'Inspection Fee'],
            ['name' => 'Demand Notice'],
            ['name' => 'Monitoring Fee']
        ];

        DB::table('payment_types')->insert($types);
    }
}
