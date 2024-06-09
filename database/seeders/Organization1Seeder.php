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

class Organization1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DEMA START
        Organization::create([
            'name_organization' => 'Dewan Mahasiswa',
            'singkatan_organization' => 'DEMA',
            'description_organization' => 'organisasi untuk seluruh mahasiswa unida gontor',
            'logo_organization' => 'img/dema.png',
            'user_id' => 1 //$user->id
        ]);
        //  KETUA Start
        Departement::create([
            'name_departement' => 'Ketua',
            'organization_id' => 1,
            'description' => 'ketua dema'
        ]);
        Position::create([
            'name_positions' => 'Ketua',
            'description' => 'ketua',
            'departements_id' => 1,
        ]);
        Position::create([
            'name_positions' => 'Wakil Ketua',
            'description' => 'wakil ketua',
            'departements_id' => 1,
        ]);
        Member::create([ // 1
            'name_member' => 'Hardi Taslim',
            'email_member' => 'hardi@gmail.com',
            'phone_member' => '081676324201',
            'address_member' => 'Lombok',
            'organizations_id' => 1,
            'departements_id' => 1,
            'position_id' => 1
        ]);
        Member::create([ // 2
            'name_member' => 'Kautsar Akhdan',
            'email_member' => 'kautsar@gmail.com',
            'phone_member' => '0816763944222',
            'address_member' => 'Bogor',
            'organizations_id' => 1,
            'departements_id' => 1,
            'position_id' => 2
        ]);
        WorkProgram::create([
            'name_program' => 'Membuat Struktur Organisasi yang FIX',
            'description' => '-',
            'status_program' => 'notyet',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(7),
            'departements_id' => 1
        ]);
        Event::create([
            'name_event' => 'Pergantian Pengurus DEMA',
            'description' => 'acara tahunan',
            'event_date_start' => Carbon::now()->addDays(1),
            'event_date_end' => Carbon::now()->addDays(4),
            'location' => 'Universitas Darussalam Gontor',
            'departements_id' => 1,
            'organization_id' => 1,
            'member_id' => 1
        ]);
        //  Publikasi Start
        Departement::create([
            'name_departement' => 'Publikasi',
            'organization_id' => 1,
            'description' => 'departement yang mengurus masalah dokumentasi acara, publikasi acara, website dema, dan lain lain.',
            'parent_id' => 1
        ]);
        Position::create([
            'name_positions' => 'Ketua',
            'description' => 'ketua',
            'departements_id' => 2,
        ]);
        Position::create([
            'name_positions' => 'Wakil Ketua',
            'description' => 'wakil ketua',
            'departements_id' => 2,
        ]);
        Position::create([
            'name_positions' => 'Bendahara',
            'description' => 'bendahara',
            'departements_id' => 2,
        ]);
        Position::create([
            'name_positions' => 'Sekretaris',
            'description' => 'sekretaris',
            'departements_id' => 2,
        ]);
        Position::create([
            'name_positions' => 'Inventaris',
            'description' => 'inventaris',
            'departements_id' => 2,
        ]);
        Member::create([
            'name_member' => 'Nur Wahyudi',
            'email_member' => 'wahyudi@gmail.com',
            'phone_member' => '081229495634',
            'address_member' => 'Cirebon',
            'organizations_id' => 1,
            'departements_id' => 2,
            'position_id' => 3 // mulai dari 3
        ]);
        Member::create([
            'name_member' => 'Zakiki Syahrindra',
            'email_member' => 'zakiki@gmail.com',
            'phone_member' => '081220594203',
            'address_member' => 'Nganjuk',
            'organizations_id' => 1,
            'departements_id' => 2,
            'position_id' => 4
        ]);
        Member::create([
            'name_member' => 'Ali Muhsin',
            'email_member' => 'ali@gmail.com',
            'phone_member' => '0812205942222',
            'address_member' => 'Madura',
            'organizations_id' => 1,
            'departements_id' => 2,
            'position_id' => 5
        ]);
        Member::create([
            'name_member' => 'Naufal Harits Prasetia',
            'email_member' => 'naufalharis@gmail.com',
            'phone_member' => '081220594202',
            'address_member' => 'Subang',
            'organizations_id' => 1,
            'departements_id' => 2,
            'position_id' => 6
        ]);
        Member::create([
            'name_member' => 'Zidnal Arzaq',
            'email_member' => 'zidnal@gmail.com',
            'phone_member' => '081220394201',
            'address_member' => 'Bogor',
            'organizations_id' => 1,
            'departements_id' => 2,
            'position_id' => 7
        ]);
        WorkProgram::create([
            'name_program' => 'Membuat website DEMA',
            'description' => 'membuat website dengan laravel + tailwindcss',
            'status_program' => 'completed',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(7),
            'departements_id' => 2
        ]);
        Task::create([
            'name_task' => 'membeli hosting di NiagaHoster',
            'description' => 'penting',
            'due_date' => Carbon::now()->addDays(3),
            'status_task' => 'notyet',
            'departements_id' => 2,
            'member_id' => 3 // mulai dari 3
        ]);
        Event::create([
            'name_event' => 'Festival Teknik Informatika Darussalam',
            'description' => 'acara tahunan',
            'event_date_start' => Carbon::now()->addDays(8),
            'event_date_end' => Carbon::now()->addDays(9),
            'location' => 'Universitas Darussalam Gontor Ponorogo',
            'departements_id' => 2,
            'organization_id' => 1,
            'member_id' => 4
        ]);
        //  Publikasi End
        //  PSDM Start
        Departement::create([
            'name_departement' => 'PSDM',
            'organization_id' => 1,
            'description' => 'PSDM (Pengembangan Sumber Daya Mahasiswa) adalah departement yang bergerak dalam memberi wadah yang relevan dalam pengenalan serta pengembangan potensi diri.',
            'parent_id' => 1
        ]);
        Position::create([
            'name_positions' => 'Ketua',
            'description' => 'ketua',
            'departements_id' => 3,
        ]);
        Position::create([
            'name_positions' => 'Wakil Ketua',
            'description' => 'wakil ketua',
            'departements_id' => 3,
        ]);
        Position::create([
            'name_positions' => 'Bendahara',
            'description' => 'bendahara',
            'departements_id' => 3,
        ]);
        Position::create([
            'name_positions' => 'Sekretaris',
            'description' => 'sekretaris',
            'departements_id' => 3,
        ]);
        Position::create([
            'name_positions' => 'Perlengkapan',
            'description' => 'Perlengkapan',
            'departements_id' => 3,
        ]);
        Member::create([ // 6
            'name_member' => 'Teguh Firmansyah',
            'email_member' => 'teguh@gmail.com',
            'phone_member' => '0812213412888',
            'address_member' => 'Semarang',
            'organizations_id' => 1,
            'departements_id' => 3,
            'position_id' => 8 // mulai dari 8
        ]);
        Member::create([ // 7
            'name_member' => 'Yazeed Alghifari',
            'email_member' => 'yazeed@gmail.com',
            'phone_member' => '081220594203',
            'address_member' => 'Ponorogo',
            'organizations_id' => 1,
            'departements_id' => 3,
            'position_id' => 9
        ]);
        Member::create([ // 8
            'name_member' => 'Fawwaz Nugraha',
            'email_member' => 'fawwaz@gmail.com',
            'phone_member' => '0812205923122',
            'address_member' => 'Kuningan',
            'organizations_id' => 1,
            'departements_id' => 3,
            'position_id' => 10
        ]);
        Member::create([ // 9
            'name_member' => 'Muh Def Putra',
            'email_member' => 'def@gmail.com',
            'phone_member' => '081234594202',
            'address_member' => 'Kalimantan',
            'organizations_id' => 1,
            'departements_id' => 3,
            'position_id' => 11
        ]);
        Member::create([ // 10
            'name_member' => 'Alvin Arya Pangestu',
            'email_member' => 'alvin@gmail.com',
            'phone_member' => '081676394201',
            'address_member' => 'Lampung',
            'organizations_id' => 1,
            'departements_id' => 3,
            'position_id' => 12
        ]);
        WorkProgram::create([
            'name_program' => 'Mengadakan EVENT IconFest 2.0',
            'description' => 'ada lomba, seminar, dan lain lain',
            'status_program' => 'notyet',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(7),
            'departements_id' => 3
        ]);
        Event::create([
            'name_event' => 'Informatika Festival ICONFEST 2.0',
            'description' => 'acara tahunan',
            'event_date_start' => Carbon::now()->addDays(4),
            'event_date_end' => Carbon::now()->addDays(6),
            'location' => 'Universitas Muhamadiyah Semarang',
            'departements_id' => 3,
            'organization_id' => 1,
            'member_id' => 10
        ]);
        Task::create([
            'name_task' => 'membuat proposal kegiatan untuk acara ICONFEST 2.0',
            'description' => 'penting',
            'due_date' => Carbon::now()->addDays(3),
            'status_task' => 'notyet',
            'departements_id' => 3,
            'member_id' => 9
        ]);
        //  PSDM End
    }
}
