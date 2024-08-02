<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::query()->find(1);

        $role = Role::firstOrCreate(['name' => 'post' , 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'post read all' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'post show' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'post edit' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'post create' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'post disable' , 'guard_name' => 'admins']));

        $admin->assignRole($role->id);

        $role = Role::firstOrCreate(['name' => 'category' , 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'category read all' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'category show' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'category edit' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'category create' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'category disable' , 'guard_name' => 'admins']));

        $admin->assignRole($role->id);

        $role = Role::firstOrCreate(['name' => 'content_type' , 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'content_type read all' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'content_type show' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'content_type edit' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'content_type create' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'content_type disable' , 'guard_name' => 'admins']));

        $admin->assignRole($role->id);

        $role = Role::firstOrCreate(['name' => 'banner' , 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'banner read all' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'banner show' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'banner edit' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'banner create' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'banner disable' , 'guard_name' => 'admins']));

        $admin->assignRole($role->id);

        $role = Role::firstOrCreate(['name' => 'section' , 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'section read all' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'section show' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'section edit' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'section create' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'section disable' , 'guard_name' => 'admins']));

        $admin->assignRole($role->id);

        $role = Role::firstOrCreate(['name' => 'gallery' , 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'gallery read all' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'gallery show' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'gallery edit' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'gallery create' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'gallery disable' , 'guard_name' => 'admins']));

        $admin->assignRole($role->id);

        $role = Role::firstOrCreate(['name' => 'permission_mange' , 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'permission_mange read all' , 'guard_name' => 'admins']));
        $role->givePermissionTo(Permission::firstOrCreate(['name' => 'permission_mange assign' , 'guard_name' => 'admins']));

        $admin->assignRole($role->id);

    }
}
