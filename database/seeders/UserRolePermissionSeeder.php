<?php

namespace Database\Seeders;

//use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Zamshedul Arifin',
            'email' => 'superadmin@gmail.com',
            'mobile' => '01843215702',
            'role' => 1,
            'password' => bcrypt('12345678'),
        ]);
        $admin = User::create([
            'name' => 'Admin User ',
            'email' => 'admin@gmail.com',
            'mobile' => '01843215702',
            'role' => 2,
            'password' => bcrypt('12345678'),
        ]);
        $partner = User::create([
            'name' => 'Partner',
            'email' => 'partner@gmail.com',
            'mobile' => '01648905775',
            'role' => 3,
            'password' => bcrypt('12345678'),
        ]);
        // permission create
        $permissions = [
            'user-management-view',
            'user-management-add',
            'user-management-edit',
            'user-management-delete',
            'user-management-profile',
            'role-permission-view',
            'role-permission-add',
            'role-permission-edit',
            'role-permission-delete',
            'permission-assign',
            'permission-view',
            'permission-add',
            'permission-edit',
            'permission-delete',
            'area-view',
            'area-add',
            'area-edit',
            'area-delete',
            'partner-view',
            'partner-add',
            'partner-edit',
            'partner-delete',
            'agreement-view',
            'agreement-add',
            'agreement-edit',
            'agreement-delete',
            'type-of-partnership-access',
            'type-of-organization-access',
            'type-of-services-access',
            'type-of-sectors-access',
            'type-of-sector-access',
            'type-of-farmers-access',
            'policy-view',
            'policy-add',
            'policy-edit',
            'policy-delete',
            'farmer-view',
            'farmer-add',
            'farmer-edit',
            'farmer-delete',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name'=>$permission,
            ]);
        }
        $superAdminRole = Role::create(['name' => 'Super Admin', 'guard_name' => 'web'])
            ->givePermissionTo([
                'user-management-view',
                'user-management-add',
                'user-management-edit',
                'user-management-delete',
                'user-management-profile',
                'role-permission-view',
                'role-permission-add',
                'role-permission-edit',
                'role-permission-delete',
                'permission-assign',
                'permission-view',
                'permission-add',
                'permission-edit',
                'permission-delete',
                'area-view',
                'area-add',
                'area-edit',
                'area-delete',
                'partner-view',
                'partner-add',
                'partner-edit',
                'partner-delete',
                'agreement-view',
                'agreement-add',
                'agreement-edit',
                'agreement-delete',
                'type-of-partnership-access',
                'type-of-organization-access',
                'type-of-sectors-access',
                'type-of-services-access',
                'type-of-sector-access',
                'type-of-farmers-access',
                'policy-view',
                'policy-add',
                'policy-edit',
                'policy-delete',
                'farmer-view',
                'farmer-add',
                'farmer-edit',
                'farmer-delete',
            ]);

            $adminRole = Role::create(['name' => 'Admin', 'guard_name' => 'web'])
            ->givePermissionTo([
                'user-management-view',
                'user-management-add',
                'user-management-edit',
                'user-management-delete',
                'user-management-profile',
                'role-permission-view',
                'role-permission-add',
                'role-permission-edit',
                'role-permission-delete',
                'permission-assign',
                'permission-view',
                'permission-add',
                'permission-edit',
                'permission-delete',
                'area-view',
                'area-add',
                'area-edit',
                'area-delete',
                'partner-view',
                'partner-add',
                'partner-edit',
                'partner-delete',
                'agreement-view',
                'agreement-add',
                'agreement-edit',
                'agreement-delete',
                'type-of-partnership-access',
                'type-of-organization-access',
                'type-of-services-access',
                'type-of-sector-access',
                'policy-view',
                'policy-add',
                'policy-edit',
                'policy-delete',
            ]);

            $partnerRole = Role::create(['name' => 'Partner', 'guard_name' => 'web'])
            ->givePermissionTo([
                'area-view',
                'area-add',
                'area-edit',
                'area-delete',
                'partner-view',
                'policy-view',
                'policy-add',
                'policy-edit',
                'policy-delete',
            ]);

        // user role assign
        $superAdmin->assignRole([$superAdminRole->id]);
        $admin->assignRole([$adminRole->id]);
        $partner->assignRole([$partnerRole->id]);

    }
}
