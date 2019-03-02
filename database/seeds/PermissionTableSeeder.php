<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Create',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'View',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete',
            'guard_name' => 'web',
        ]);
    }
}
