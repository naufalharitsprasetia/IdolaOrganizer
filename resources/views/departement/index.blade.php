@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3 text-center underline">Struktur Organisasi</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="button-secondary font-medium text-wrap my-3 text-center">
            <a href="/struktur/create?org={{ $organization->id }}" class=""><span>
                    Tambahkan
                    Departement (Bagian)
                    Baru
                </span>
            </a>
        </div>
        <div class="flex flex-col md:flex-row gap-2 justify-center content-center flex-wrap">
            @foreach ($departements as $departement)
                <div class="departement-card bg-primary text-fourth p-4 rounded-lg md:w-2/5 mt-5 border-4 border-secondary">
                    <h1 class="font-bold text-2xl text-center my-3">{{ $departement->name_departement }}</h1>
                    <p class="font-medium text-sm text-center my-2">"{{ $departement->description }}"</p>
                    <h4 class="font-medium text-base mt-2 mb-5 text-center">Jumlah Anggota :
                        {{ count($departement->members) }}</h4>
                    <div class="flex items-center justify-center">
                        <a href="/struktur/{{ $departement->id }}"
                            class="mx-auto px-12 py-1 rounded-lg bg-fourth text-primary border-primary border-2 hover:bg-primary hover:text-fourth hover:ring-2 hover:ring-inset hover:ring-third">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
