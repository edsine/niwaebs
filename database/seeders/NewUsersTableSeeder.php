<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users=[
            [
                'first_name'=>'A.A.',
                'last_name'=>'DABAI',
                'email'=>'hr@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'UMAR YUSUF',
                'last_name'=>'GIRE',
                'email'=>'finance@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'DAKOI',
                'last_name'=>'HORSEFALL',
                'email'=>'marine@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'EJIKE',
                'last_name'=>'FIDELIS .E.',
                'email'=>'engineer@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'HENRY',
                'last_name'=>'ADIMOHA',
                'email'=>'survey@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'AGBANI',
                'last_name'=>'FIDELIS',
                'email'=>'port@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'JAPHET',
                'last_name'=>'.I. MAISAJE',
                'email'=>'audit@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'inland waterway',
                'last_name'=>'police command',
                'email'=>'police@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'coordination',
                'last_name'=>'department',
                'email'=>'coordination@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'MOHAMMED',
                'last_name'=>'AMIN DANGANA',
                'email'=>'project@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'IBRAHIM',
                'last_name'=>'ISYAKU SADE',
                'email'=>'procurement@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'NAZIRU',
                'last_name'=>'BIYANKARE',
                'email'=>'legal@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'research planning and',
                'last_name'=>'ict',
                'email'=>'ict@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'business',
                'last_name'=>'development',
                'email'=>'business@niwa.com',
                'password'=>bcrypt('12345678')
            ],
        ];

        DB::table('users')->insert($users);
    }
}
