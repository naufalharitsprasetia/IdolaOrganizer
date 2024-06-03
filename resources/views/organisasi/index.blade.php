@extends('layouts.main')

@section('content')
    {{-- organization section --}}
    <section id="organization" class="pt-14 pb-28 bg-primary text-fourth w-full px-20">
        <div class="container-mx-auto">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold px-4 border-r-2 ">Organisasi</h2><span class="mx-2"> Home /
                    Organisasi</span>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-12 mt-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{--  --}}
            <div class="ml-3 my-4 text-sm">
                <a href="/organisasi-create" class="button-secondary">Tambahkan Organisasi Baru</a>
            </div>
            <div class="flex flex-wrap gap-1">
                {{-- card 1 --}}
                {{-- <div
                    class="card-org px-6 py-4 bg-yellow-800 rounded-xl basis-1/3 m-12 flex flex-col font-semibold hover:bg-yellow-700 cursor-pointer">
                    <h3 class="px-2 mb-2">HIMATIF Unida Gontor</h3>
                    <div class="flex mb-14">
                        <p class="px-2 border-r-2">Aktif</p>
                        <p class="px-2 border-r-2">28 Orang</p>
                        <p class="px-2 border-r-2">5 Departemen</p>
                    </div>
                    <div class="progress-bar px-2"></div>
                    <button
                        class="px-2 py-1 bg-fourth text-yellow-600 rounded-lg border-1 hover:bg-third hover:text-yellow-800">Kelola</button>
                </div> --}}
                {{--  card 2 --}}
                @foreach ($organizations as $organization)
                    <div
                        class="card-org px-6 py-4 bg-fourth border-secondary text-primary border-4 border-dashed rounded-xl basis-1/3 mx-auto my-6 flex flex-col font-semibold hover:bg-third ">
                        <img src="{{ asset('/storage.' . '/' . $organization->logo_organization) }}"
                            class="w-28 self-center my-6" alt="">
                        <hr>
                        <h3 class="px-2 mb-[1px] font-bold text-2xl">{{ $organization->singkatan_organization }}</h3>
                        <span class="text-sm font-semibold px-2 mb-2">({{ $organization->name_organization }})</span>
                        <div class="flex mb-14">
                            <p class="px-2 border-r-2 border-primary">Aktif</p>
                            <p class="px-2 border-r-2 border-primary">28 Orang</p>
                            <p class="px-2 border-r-2 border-primary">5 Departemen</p>
                        </div>
                        <div class="progress-bar px-2"></div>
                        <a href="/organisasi/{{ $organization->id }}"
                            class="px-2 py-1 bg-primary text-fourth rounded-lg border-1 hover:bg-fourth hover:text-primary hover:ring-2 hover:ring-inset hover:ring-primary text-center">Kelola</a>
                    </div>
                @endforeach
                {{-- add card --}}
                <a href="/organisasi-create"
                    class="card-org px-6 py-4 justify-center items-center bg-fourth border-secondary text-primary border-4 border-dashed rounded-xl basis-1/3 mx-auto my-6  flex flex-col font-semibold hover:bg-third cursor-pointer">
                    + Tambahkan Organisasi Baru
                </a>
            </div>
        </div>
    </section>
@endsection
