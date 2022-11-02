<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ],[
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'user',
        ]];
        User::insert($users);
    }
}
