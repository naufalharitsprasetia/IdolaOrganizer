@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Program Kerja</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/struktur/create?org={{ $organization->id }}" class="button-secondary my-3">Tambahkan Program Kerja</a>
    </div>
@endsection
