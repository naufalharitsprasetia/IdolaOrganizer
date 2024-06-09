@extends('layouts.main')

@section('content')
    {{-- organization section --}}
    <section id="organization" class="pt-14 pb-28 bg-primary text-fourth w-full md:px-20">
        <div class="container mx-auto">
            <h1 class="font-bold text-3xl mb-6 text-center underline">Profil Pengguna</h1>
            <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-end mb-4">
                    <a href="/edit-profile" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Edit
                        Profil</a>
                </div>
                <div class="flex items-center mb-4">
                    <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-center items-center overflow-hidden">
                        @if (auth()->user()->gender == 'female')
                            <img src="/img/avatar-female.jpg" alt="">
                        @else
                            <img src="/img/avatar-male.jpg" alt="">
                        @endif
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                        <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <h4 class="font-semibold text-gray-700">Informasi Tambahan:</h4>
                    <p class="text-gray-600">Tanggal Pembuatan Akun: {{ auth()->user()->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
