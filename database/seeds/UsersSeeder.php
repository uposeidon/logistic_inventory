<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'topdev007@gmail.com',
            'password' => Hash::make('admin'),
            'roles' => ['ROLE_ADMIN']
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'roles' => ['ROLE_USER']
        ]);
    }
}
