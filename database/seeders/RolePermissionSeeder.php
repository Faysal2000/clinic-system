<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage appointments']);

        // roles
        $admin = Role::create(['name' => 'admin']);
        $doctor = Role::create(['name' => 'doctor']);

        // give permissions
        $admin->givePermissionTo(Permission::all());
        $doctor->givePermissionTo('view dashboard');

        // permissions
        $permissions = [
            'view dashboard',

            'view users', 'create users', 'edit users', 'delete users',

            'view appointments', 'create appointments', 'edit appointments', 'delete appointments',

            'view patients', 'create patients', 'edit patients', 'delete patients',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // roles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $doctor = Role::create(['name' => 'doctor']);
        $receptionist = Role::create(['name' => 'receptionist']);

        $admin->givePermissionTo(Permission::all());
    }
}
