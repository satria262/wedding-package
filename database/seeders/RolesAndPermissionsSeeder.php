<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        Permission::firstOrCreate(['name' => 'manage packages']);
        Permission::firstOrCreate(['name' => 'book packages']);
        Permission::firstOrCreate(['name' => 'view testimonials']);
        Permission::firstOrCreate(['name' => 'create testimonials']);
        Permission::firstOrCreate(['name' => 'edit testimonials']);
        Permission::firstOrCreate(['name' => 'delete testimonials']);
        Permission::firstOrCreate(['name' => 'view transactions']);
        Permission::firstOrCreate(['name' => 'create transactions']);
        Permission::firstOrCreate(['name' => 'edit transactions']);
        Permission::firstOrCreate(['name' => 'delete transactions']);
        Permission::firstOrCreate(['name' => 'view bonuses']);
        Permission::firstOrCreate(['name' => 'create bonuses']);
        Permission::firstOrCreate(['name' => 'edit bonuses']);
        Permission::firstOrCreate(['name' => 'delete bonuses']);

        // Assign permission ke role
        $admin->givePermissionTo(Permission::all());
        $user->givePermissionTo('book packages');
    }
}
