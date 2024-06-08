<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Organization;
use App\Models\Departement;
use App\Models\Event;
use App\Models\Member;
use App\Models\Position;
use App\Models\Task;
use App\Models\WorkProgram;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            Organization1Seeder::class,
            Organization2Seeder::class,
        ]);
        // $user = User::where('email', 'naufal@gmail.com')->first();

    }
}
