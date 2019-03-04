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
        $roles = [
            'admin',
            'editing',
            'viewing',
            'deleting',
         ];
         $permissions = [
            'create',
            'view',
            'edit',
            'delete',
         ];

         foreach ($roles as $role) {
            Role::create(['name' => $role, 'guard_name' => 'web']);
       }

        $adminRole = Role::where('name', 'admin')->first();
        foreach ($permissions as $permission) {
            $adminRole->givePermissionTo($permission);  
        }

        Role::where('name', 'viewing')->first()->givePermissionTo('view');  
        Role::where('name', 'editing')->first()->givePermissionTo('edit');  
        Role::where('name', 'deleting')->first()->givePermissionTo('delete');  
    }
}
