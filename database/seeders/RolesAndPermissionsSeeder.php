<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Permissions =====
        $viewDashboard = Permission::firstOrCreate(
            ['name' => 'view dashboard', 'guard_name' => 'web']
        );

        $viewAdminDashboard = Permission::firstOrCreate(
            ['name' => 'view admin dashboard', 'guard_name' => 'web'] // غيرت guard_name إلى web لتجنب التعقيد
        );

        // ===== Roles =====
        $userRole = Role::firstOrCreate(
            ['name' => 'user', 'guard_name' => 'web']
        );

        $adminRole = Role::firstOrCreate(
            ['name' => 'admin', 'guard_name' => 'web'] // غيرت guard_name إلى web لتجنب التعقيد
        );

        // ===== Assign Permissions =====
        if (!$userRole->hasPermissionTo($viewDashboard)) {
            $userRole->givePermissionTo($viewDashboard);
        }

        if (!$adminRole->hasPermissionTo($viewAdminDashboard)) {
            $adminRole->givePermissionTo($viewAdminDashboard);
        }
    }
}
