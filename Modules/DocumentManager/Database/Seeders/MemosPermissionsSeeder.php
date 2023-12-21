<?php

namespace Modules\DocumentManager\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemosPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayOfPermissionNames =
            [
                'create memo',
                'read memo',
                'update memo',
                'delete memo',
                'assign memo to department',
                'read department-memo assignment',
                'delete memo-department assignment',
                'assign memo to user',
                'read user-memo assignment',
                'delete memo-user assignment',
            ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        // Assign permissions to Super admin role
        $super_admin_role = Role::first();
        $super_admin_role->givePermissionTo(Permission::all());

    }
}
