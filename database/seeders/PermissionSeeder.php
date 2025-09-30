<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Clean up the existing permissions
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('model_has_permissions')->delete();
        \DB::table('role_has_permissions')->delete();
        Permission::query()->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create permissions for users
        Permission::firstOrCreate(['name' => 'view users', 'guard_name' => 'web'], ['head' => 'Users']);
        Permission::firstOrCreate(['name' => 'create users', 'guard_name' => 'web'], ['head' => 'Users']);
        Permission::firstOrCreate(['name' => 'edit users', 'guard_name' => 'web'], ['head' => 'Users']);
        Permission::firstOrCreate(['name' => 'delete users', 'guard_name' => 'web'], ['head' => 'Users']);

        Permission::firstOrCreate(['name' => 'assign roles', 'guard_name' => 'web'], ['head' => 'Roles']);


        $permissions = Permission::all();

        // Remove all permissions for all roles
        Role::all()->each(function ($role) {
            $role->syncPermissions([]);
        });

        // Create super-admin role and assign all permissions
        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $role->givePermissionTo($permissions);
    }
}
