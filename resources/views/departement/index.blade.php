@extends('neolayout.main')

@push('styles')
    <style>
        .node {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            margin: 5px;
        }

        .tree {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .branches {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .line-vertical {
            width: 2px;
            height: 20px;
            background-color: #ccc;
        }

        .line-horizontal {
            height: 2px;
            flex-grow: 1;
            background-color: #ccc;
        }

        .branch-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
@endpush
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
        <div class="container mx-auto py-6">
            <h1 class="text-2xl font-bold mb-6 text-center">Bagan Hierarki Departement</h1>
            <div class="tree">
                @foreach ($departements as $departement)
                    @include('components.node', ['departement' => $departement])
                    <hr class="border-2 border-primary w-full my-4">
                @endforeach
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-2 justify-center content-center flex-wrap">
            @foreach ($departementss as $departement)
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
    {{-- <hr class="border-2 border-primary w-full my-4"> --}}
@endsection
