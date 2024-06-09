@extends('neolayout.main')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <a href="/struktur?org={{ $organization->id }}" class="button-primary md:absolute md:right-2 md:top-2">Back</a>
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3 underline">Departement (Bagian) :
            {{ $departement->name_departement }}</h2>
        <p class="text-base font-medium mt-1 mb-6 mx-3">Deskripsi : "{{ $departement->description }}"</p>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- POSISI START --}}
        <div class="position mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Posisi : </p>
            <div class="button-primary inline-block">
                <a href="/posisi/create?dept={{ $departement->id }}" class="">Tambah posisi</a>
            </div>
            <ul class="mt-3 ml-3">
                @foreach ($positions as $position)
                    <li>- {{ $position->name_positions }}</li>
                @endforeach
            </ul>
        </div>
        {{-- MEMBER START --}}
        <div class="anggota mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Anggota : </p>
            <div class="button-primary inline-block">
                <a href="/member/create?dept={{ $departement->id }}" class="">Tambah anggota</a>
            </div>
            @foreach ($members as $member)
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="/img/profile.jpg" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $member->name_member }} -
                                    ({{ $member->position->name_positions }})
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $member->email_member }}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{ $member->position->name_position }}</p>
                            <a href="/member/{{ $member->id }}?org={{ $organization->id }}"
                                class="mt-1 text-xs font-semibold leading-5 text-fourth rounded-lg px-3 py-2 bg-secondary hover:text-secondary hover:bg-fourth border-2 hover:border-secondary">Detail</a>
                            @if ($member->user_id != null)
                                <div class="flex flex-wrap gap-1 bg-white">
                                    <p class="text-white bg-green-400 px-2 py-1 rounded-lg ">
                                        Telah
                                        Sinkron</p>
                                </div>
                            @else
                                <div class="flex flex-wrap gap-1 bg-white">
                                    <button data-member-id="{{ $member->id }}"
                                        data-member-email="{{ $member->email_member }}" type="button"
                                        class="sync-button text-white bg-rose-500 px-2 py-1 rounded-lg hover:opacity-80">Belum
                                        Sinkron</button>
                                </div>
                            @endif
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
        {{-- PROKER START --}}
        <div class="proker mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Program Kerja : </p>
            <div class="button-primary inline-block">
                <a href="/proker/create?dept={{ $departement->id }}" class="">Tambah program kerja</a>
            </div>
            <ul class="mt-3 ml-3">

            </ul>
            {{-- Table --}}
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal border-primary border-2 ">
                        <thead>
                            <tr>
                                <th class="tableTh">
                                    Nama Program Kerja</th>
                                <th class="tableTh">
                                    Deadline</th>
                                <th class="tableTh">
                                    Aksi</th>
                                <th class="tableTh">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prokers as $proker)
                                <tr>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $proker->name_program }}</p>
                                    </td>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ Carbon::parse($proker->end_date)->format('d-m-Y') }}<br><span
                                                class="text-xs">({{ $proker->days_remaining }} Hari Lagi)</span></p>
                                    </td>
                                    </td>
                                    <td class=" bg-white">
                                        <div class="flex flex-wrap gap-1 bg-white">
                                            <a href=""
                                                class="text-white bg-blue-600 px-2 py-1 rounded-lg hover:opacity-80">Detail</a>

                                            <a href=""
                                                class="text-white bg-yellow-500 px-2 py-1 rounded-lg hover:opacity-80">Edit</a>
                                            <form action="" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button
                                                    class=" text-white bg-rose-600 px-2 py-1 rounded-lg hover:opacity-80"
                                                    onclick="return confirm('Are you Sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="tableTd">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-slate-500 leading-tight">
                                            <span aria-hidden="true"
                                                class="absolute inset-0  {{ $proker->status_program == 'completed' ? 'bg-green-200' : '' }} {{ $proker->status_program == 'notyet' ? 'bg-red-400' : '' }} {{ $proker->status_program == 'progress' ? 'bg-yellow-300' : '' }} {{ $proker->status_program == 'pending' ? 'bg-yellow-500' : '' }} opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $proker->status_program }}</span>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End Table --}}
        </div>
        {{-- TUGAS START --}}
        <div class="tasks mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Tugas : </p>
            <div class="button-primary inline-block">
                <a href="/task/create?dept={{ $departement->id }}" class="">Tambah tugas</a>
            </div>
            {{-- Table --}}
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal border-primary border-2 ">
                        <thead>
                            <tr>
                                <th class="tableTh">
                                    Nama Tugas</th>
                                <th class="tableTh">
                                    Deadline</th>
                                <th class="tableTh">
                                    Penanggung Jawab</th>
                                <th class="tableTh">
                                    Aksi</th>
                                <th class="tableTh">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $task->name_task }}</p>
                                    </td>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ Carbon::parse($task->due_date)->format('d-m-Y') }}<br><span
                                                class="text-xs">({{ $task->days_remaining }} Hari Lagi)</span></p>
                                    </td>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $task->member->name_member }}</p>
                                    </td>
                                    </td>
                                    <td class=" bg-white">
                                        <div class="flex flex-wrap gap-1 bg-white">
                                            <a href=""
                                                class="text-white bg-blue-600 px-2 py-1 rounded-lg hover:opacity-80">Detail</a>

                                            <a href=""
                                                class="text-white bg-yellow-500 px-2 py-1 rounded-lg hover:opacity-80">Edit</a>
                                            <form action="" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button
                                                    class=" text-white bg-rose-600 px-2 py-1 rounded-lg hover:opacity-80"
                                                    onclick="return confirm('Are you Sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="tableTd">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-slate-500 leading-tight">
                                            <span aria-hidden="true"
                                                class="absolute inset-0 {{ $task->status_task == 'completed' ? 'bg-green-200' : '' }} {{ $task->status_task == 'notyet' ? 'bg-red-400' : '' }} {{ $task->status_task == 'progress' ? 'bg-yellow-300' : '' }} {{ $task->status_task == 'pending' ? 'bg-yellow-500' : '' }} opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $task->status_task }}</span>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End Table --}}
        </div>
        {{-- KEGIATAN START --}}
        <div class="kegiatan mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Kegiatan : </p>
            <div class="button-primary inline-block">
                <a href="/event/create?dept={{ $departement->id }}" class="">Tambah kegiatan</a>
            </div>

            {{-- Table --}}
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal border-primary border-2 ">
                        <thead>
                            <tr>
                                <th class="tableTh">
                                    Nama Tugas</th>
                                <th class="tableTh">
                                    Tanggal Acara</th>
                                <th class="tableTh">
                                    Penanggung Jawab</th>
                                <th class="tableTh">
                                    Lokasi</th>
                                <th class="tableTh">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $event->name_event }}</p>
                                    </td>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ Carbon::parse($event->event_date_end)->format('d-m-Y') }} <br><span
                                                class="text-xs">({{ $event->days_remaining }} Hari Lagi)</span>
                                        </p>
                                    </td>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $event->member->name_member }}</p>
                                    </td>
                                    <td class="tableTd">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $event->location }}</p>
                                    </td>
                                    </td>
                                    <td class=" bg-white">
                                        <div class="flex flex-wrap gap-1 bg-white">
                                            <a href="/event/{{ $event->id }}?org={{ $organization->id }}"
                                                class="text-white bg-blue-600 px-2 py-1 rounded-lg hover:opacity-80">Detail</a>

                                            <a href=""
                                                class="text-white bg-yellow-500 px-2 py-1 rounded-lg hover:opacity-80">Edit</a>
                                            <form action="" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button
                                                    class=" text-white bg-rose-600 px-2 py-1 rounded-lg hover:opacity-80"
                                                    onclick="return confirm('Are you Sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End Table --}}
        </div>

    </div>
    <!-- Modal Input Email -->
    <div id="syncModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl mb-4">Sync Member</h2>
            <p class="text-xs mb-2 text-red-500">ubah data member untuk mengganti email dibawah</p>
            <form id="syncForm" method="POST" action="{{ route('member.sync') }}">
                @csrf
                <input type="hidden" name="member_id" id="member_id">
                <input type="hidden" name="organization_id" id="organization_id" value="{{ $organization->id }}">
                <label for="email" class="block text-sm font-medium text-gray-700">User Email</label>
                <input type="email" name="email" id="email" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <div class="mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Sync</button>
                    <button type="button" class="close-modal bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Script --}}
    <script>
        // Buka Modal Sync
        document.querySelectorAll('.sync-button').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('member_id').value = this.getAttribute('data-member-id');
                document.getElementById('email').value = this.getAttribute('data-member-email');
                document.getElementById('syncModal').classList.remove('hidden');
            });
        });

        // Tutup Modal
        document.querySelector('.close-modal').addEventListener('click', function() {
            document.getElementById('syncModal').classList.add('hidden');
        });
    </script>
@endsection
