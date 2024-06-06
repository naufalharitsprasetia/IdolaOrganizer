@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <a href="/struktur?org={{ $organization->id }}" class="button-primary absolute right-1 top-1">Back</a>
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Departement (Bagian) : {{ $departement->name_departement }}</h2>
        <p class="text-base font-medium mt-1 mb-6 mx-3">Deskripsi : "{{ $departement->description }}"</p>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="position mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Posisi : </p>
            <a href="/posisi/create?dept={{ $departement->id }}" class="button-primary">Tambah posisi</a>
            @foreach ($positions as $position)
                <ul class="mt-3 ml-3">
                    <li>- {{ $position->name_positions }}</li>
                </ul>
            @endforeach
        </div>
        <div class="anggota mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Anggota : </p>
            <a href="/member/create?dept={{ $departement->id }}" class="button-primary">Tambah anggota</a>
            @foreach ($members as $member)
                {{-- <ul class="mt-3 ml-3">
                    <li>- {{ $member->name_member }}</li>
                </ul> --}}
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
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
                                class="mt-1 text-xs leading-5 text-gray-500">Detail</a>
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
        <div class="proker mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Program Kerja : </p>
            <a href="/proker/create?dept={{ $departement->id }}" class="button-primary">Tambah program kerja</a>
            @foreach ($prokers as $proker)
                <ul class="mt-3 ml-3">
                    <li>- {{ $proker->name_program }}</li>
                </ul>
            @endforeach
        </div>
        <div class="tasks mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Tugas : </p>
            <a href="/task/create?dept={{ $departement->id }}" class="button-primary">tambah tugas</a>
            @foreach ($tasks as $task)
                <ul class="mt-3 ml-3">
                    <li>- {{ $task->name_task }}</li>
                </ul>
            @endforeach
        </div>
        <div class="kegiatan mb-7">
            <p class="text-xl font-semibold mt-1 mb-2 mx-3">Kegiatan : </p>
            <a href="/event/create?dept={{ $departement->id }}" class="button-primary">tambah kegiatan</a>
            @foreach ($events as $event)
                <ul class="mt-3 ml-3">
                    <li>- {{ $event->name_event }}</li>
                </ul>
            @endforeach
        </div>

    </div>
@endsection
