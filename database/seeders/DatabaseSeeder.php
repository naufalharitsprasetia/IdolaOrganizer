<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ]);
        $user = User::where('email', 'naufal@gmail.com')->first();
        Organization::create([
            'name_organization' => 'Dewan Mahasiswa',
            'singkatan_organization' => 'DEMA',
            'description_organization' => 'organisasi untuk seluruh mahasiswa unida gontor',
            'logo_organization' => 'img/vk4yf91WqCPuhDo6mKjhqoOVu0Y3WOKWXhVzyf9B.png',
            'user_id' => 1 //$user->id
        ]);
        Departement::create([
            'name_departement' => 'Publikasi',
            'organization_id' => 1,
            'description' => 'departement yang mengurus masalah dokumentasi acara, publikasi acara, website dema, dan lain lain.'
        ]);
        Position::create([
            'name_positions' => 'Sekretaris',
            'description' => 'sekre',
            'departements_id' => 1,
        ]);
        Member::create([
            'name_member' => 'Naufal Harits Prasetia',
            'email_member' => 'haris@gmail.com',
            'phone_member' => '081220594200',
            'address_member' => 'Jl. Kartawigenda No.77',
            'organizations_id' => 1,
            'departements_id' => 1,
            'position_id' => 1
        ]);
        WorkProgram::create([
            'name_program' => 'Membuat website DEMA',
            'description' => 'membuat website dengan laravel + tailwindcss',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(7),
            'departements_id' => 1
        ]);
        Task::create([
            'name_task' => 'membeli hosting di NiagaHoster',
            'description' => 'penting',
            'due_date' => Carbon::now()->addDays(3),
            'status_task' => 'notyet',
            'departements_id' => 1,
            'member_id' => 1
        ]);
        Event::create([
            'name_event' => 'Festival Teknik Informatika Darussalam',
            'description' => 'acara tahunan',
            'event_date' => Carbon::now()->addDays(30),
            'location' => 'Universitas Darussalam Gontor Ponorogo',
            'departements_id' => 1,
            'member_id' => 1
        ]);
    }
}
