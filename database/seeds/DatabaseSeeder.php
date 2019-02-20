<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Interior',
            'email' => 'interior@test.com',
            'password' => Hash::make('ronanotaza'),
            'role' => 4
        ]);
        User::create([
            'name' => 'Super_Admin',
            'email' => 'super_admin@test.com',
            'password' => Hash::make('super_admin'),
            'role' => 3
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'role' => 2
        ]);
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@test.com',
            'password' => Hash::make('ronanotaza'),
            'role' => 2
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('secret'),
            'role' => 1
        ]);
    }
}
