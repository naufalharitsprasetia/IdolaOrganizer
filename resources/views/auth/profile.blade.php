@extends('layouts.main')

@section('content')
    {{-- organization section --}}
    <section id="organization" class="pt-14 pb-28 bg-primary text-fourth w-full md:px-20">
        <div class="container-mx-auto">
            <h1 class="font-bold text-2xl underline">Profil</h1>
            <div class="ml-3 my-4 text-sm">
                <a href="/organisasi-create" class="button-secondary ">Edit Profile</a>
            </div>
            <h3>Nama : {{ auth()->user()->name }}</h3>
            <h3>Email : {{ auth()->user()->email }}</h3>
            <h3>Created At : {{ auth()->user()->created_at }}</h3>
        </div>
    </section>
@endsection
