<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RealRolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles and assign created permissions

        $roleNames =
            [
                // 'MD',
                // 'INSPECTION',
                // 'HOD',
                // 'ED FINANCE & ACCOUNT',

                // 'ADMINISTRATION',
                // 'USER',
                // 'SUPERVISOR',
                // 'CERTIFICATE/COMPLIANCE',
                // 'LEAVE PROCESSING OFFICER',
                // 'REGISTRY OFFICER',
                // 'ED ADMIN',
                // 'HR',
                // 'Branch Manager',
                // 'Regional Manager',
                // 'permsec',
                // 'minister',

                'Desk Officer MSE',
                'HOD MSE',
                'Desk Officer Finance',
                'HOD Finance',
                'Area Officer',
                'USER',
            ];

        $roles = collect($roleNames)->map(function ($roles_arrays) {
            return ['name' => $roles_arrays, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()];
        });

        Role::insert($roles->toArray());
    }
}
