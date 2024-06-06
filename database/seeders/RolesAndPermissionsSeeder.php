<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions // buat izin
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // Create roles and assign existing permissions / buat role dan tentukan role itu bisa ngapain aja
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['edit articles', 'delete articles', 'publish articles', 'unpublish articles']);
    }
}
