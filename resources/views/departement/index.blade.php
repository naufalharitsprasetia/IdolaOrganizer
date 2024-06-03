@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Struktur Organisasi</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/struktur/create?org={{ $organization->id }}" class="button-secondary my-3">Tambahkan Departement/Bagian
            Baru</a>
        @foreach ($departements as $departement)
            <div class="departement-card bg-primary text-fourth p-4 rounded-lg w-2/3 mt-5 border-4 border-secondary">
                <h2 class="my-2">Nama Departemen : {{ $departement->name_departement }}</h2>
                <h2 class="my-2">Deskripsi : {{ $departement->description }}</h2>
                <h2 class="mt-2 mb-5">Jumlah Member : 10</h2>
                <div class="flex items-center justify-center">
                    <a href=""
                        class="mx-auto px-12 py-1 rounded-lg bg-fourth text-primary border-primary border-2 hover:bg-primary hover:text-fourth hover:ring-2 hover:ring-inset hover:ring-third">Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
