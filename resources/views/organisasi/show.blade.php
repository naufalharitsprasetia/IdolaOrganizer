@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="info-organization">
        <h2 class="mb-2">Nama Organisasi : {{ $organization->name_organization }}</h2>
        <h2 class="mb-2">Singkatan : {{ $organization->singkatan_organization }}</h2>
        <div class="flex my-4">
            <h4 class="mr-4">Logo :</h4>
            <img src="{{ asset('/storage' . '/' . $organization->logo_organization) }}" class="w-20" alt="">
        </div>
        <p>Deskripsi : {{ $organization->description_organization }}</p>
    </div>
@endsection
