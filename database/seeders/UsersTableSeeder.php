<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@test.com',
            'password'=>Hash::make('12345678')
        ]);

        $user = User::create([
            'name'=>'User',
            'email'=>'user@test.com',
            'password'=>Hash::make('12345678')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }

}
