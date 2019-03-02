<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'User',
            'guard_name' => 'web',
        ]);

        $CreatePermission = Permission::where('name', 'Create')->first();
        $ViewPermission = Permission::where('name', 'View')->first();
        $EditPermission = Permission::where('name', 'Edit')->first();
        $DeletePermission = Permission::where('name', 'Delete')->first();
        $role = Role::where('name', 'admin')->first();
        $role->givePermissionTo($CreatePermission);
        $role->givePermissionTo($ViewPermission);
        $role->givePermissionTo($EditPermission);
        $role->givePermissionTo($DeletePermission);
    }
}
