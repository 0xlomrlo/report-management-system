<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('secret'),
        ]);

        $user = App\User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
