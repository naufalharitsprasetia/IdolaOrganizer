<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Data sampel
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('bismillah'),
                'role' => 'admin',
            ],
            [
                'name' => 'Fulan Ahmad',
                'email' => 'fulan@gmail.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Naufal Harits Prasetia',
                'email' => 'naufal@gmail.com',
                'password' => Hash::make('bismillah'),
            ],
        ];

        // Insert data ke dalam tabel 'users'
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
