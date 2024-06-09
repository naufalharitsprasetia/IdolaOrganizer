@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Detail Acara / Kegiatan</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/event/edit/{{ $event->id }}?dept={{ $departement->id }}" class="button-primary">Ubah Data</a>
        <form action="/event/delete/{{ $event->id }}?dept={{ $departement->id }}" class="inline"
            id="formDelete-{{ $event->id }}" method="POST">
            @method('delete')
            @csrf
            <button type="button" onclick="deleteConfirm({{ $event->id }})"
                class="text-white bg-rose-600 px-2 py-1 rounded-lg hover:opacity-80">Hapus
            </button>
        </form>
        <a href="/event?org={{ $organization->id }}" class="button-primary absolute right-1 top-1">Back</a>

        <div>
            <div class="mt-2 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama Lengkap</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $event->name_event }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Departement</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $event->departement->name_departement }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Deskripsi</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $event->description }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Lokasi</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $event->location }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Mulai</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $event->event_date_start }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Berakhir</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $event->event_date_end }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Lainnya</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $event->description }}
                        </dd>
                    </div>


                </dl>
            </div>
        </div>
    </div>
@endsection
