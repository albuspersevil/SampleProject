<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
        'name'     => 'Admin',
        'email'    => 'admin@admin.com',
        'role'     => 'admin',
        'password' => Hash::make('123456'),
    ));
    }
}
