<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            'create',
            'view',
            'edit',
            'delete',
         ];
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission, 'guard_name' => 'web']);
         }
    }
}
