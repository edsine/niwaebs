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
                'first_name'=>'Human',
                'last_name'=>'Resource',
                'email'=>'hr@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'finance',
                'last_name'=>'account',
                'email'=>'finance@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'marine',
                'last_name'=>'department',
                'email'=>'marine@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'engineering',
                'last_name'=>'department',
                'email'=>'engineer@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'survey',
                'last_name'=>'department',
                'email'=>'survey@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'ports',
                'last_name'=>'environment',
                'email'=>'port@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'audit',
                'last_name'=>'internal coordination',
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
                'first_name'=>'project management',
                'last_name'=>'special duties',
                'email'=>'project@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'procurement',
                'last_name'=>'department',
                'email'=>'procurement@niwa.com',
                'password'=>bcrypt('12345678')
            ],
            [
                'first_name'=>'legal',
                'last_name'=>'department',
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
