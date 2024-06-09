<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
                'name' => 'Naufal Harits Prasetia',
                'email' => 'naufal@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('bismillah'),
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Nur Wahyudi',
                'email' => 'wahyudi@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
            ],   [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('bismillah'),
                'is_admin' => true,
                'created_at' => Carbon::now(),
            ],
        ];

        // Insert data ke dalam tabel 'users'
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
