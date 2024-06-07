@extends('layouts.main')

@section('content')
    {{-- About Section Start --}}
    <section id="about" class="md:pt-24 md:pb-28 w-full bg-third">
        <div class="container mx-auto">
            <div class="flex flex-col-reverse md:flex-row">
                <div class="w-3/4 mb-8 md:mb-0 md:px-10 md:w-1/2 mx-auto">
                    <h2 class="text-center md:text-left font-bold text-3xl text-slate-800 pb-5">Tentang Kami</h2>
                    <p class="font-semibold text-base text-slate-500 opacity-90">IdolaOrganizer adalah aplikasi manajemen
                        organisasi yang dirancang
                        untuk memudahkan pengguna dalam mengelola berbagai aspek dari organisasi mereka. Aplikasi ini
                        memungkinkan setiap pengguna untuk membuat dan mengelola beberapa organisasi, serta memberikan akses
                        kepada anggota lain untuk membantu dalam pengelolaan. Dengan idolaOrganizer, struktur organisasi,
                        kegiatan, program kerja, tugas, daftar anggota, dan fitur lainnya yang dapat
                        diatur dengan mudah dan efisien.</p>
                </div>
                <div class="my-5 md:my-0 md:px-10 w-1/2 mx-auto flex justify-center items-center">
                    <img src="/img/logox.png" class="h-auto max-w-full" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- About Section End --}}
    {{--  --}}
    <div class="gradient-divider2"></div>
    {{-- Our TEAM --}}
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center underline">Our Team</h2>

            <div class="mt-6 grid grid-cols-3 gap-x-6 gap-y-10 sm:grid-cols-3 lg:grid-cols-3 xl:gap-x-8">
                {{-- 1 --}}
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="/img/colab-1.jpg" alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">
                                <a href="https://www.instagram.com/naufalharisprasetia/" target="_blank">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Naufal Harits Prasetia
                                </a>
                            </h3>
                        </div>
                        <p class="text-xs text-gray-500">Mahasiswa Teknik Informatika</p>
                        <p class="text-sm font-medium text-gray-900">Universitas Darussalam Gontor</p>
                    </div>
                </div>
                <!-- More products... -->
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="/img/colab-2.png" alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">
                                <a href="https://www.instagram.com/fardanio19/" target="_blank">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Mohammad Farhat
                                </a>
                            </h3>
                        </div>
                        <p class="text-xs text-gray-500">Mahasiswa Teknik Informatika</p>
                        <p class="text-sm font-medium text-gray-900">Universitas Darussalam Gontor</p>
                    </div>
                </div>
                {{-- 3 --}}
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="/img/colab-3.jpg" alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">
                                <a href="https://www.instagram.com/alvnaryap_/" target="_blank">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Alvin Arya Pangestu
                                </a>
                            </h3>
                        </div>
                        <p class="text-xs text-gray-500">Mahasiswa Teknik Informatika</p>
                        <p class="text-sm font-medium text-gray-900">Universitas Darussalam Gontor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Our TEAM --}}

    {{-- project Section Start --}}
    <div class="bg-fourth py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Project dibangun dengan teknologi :</h2>
            <div
                class="mx-auto mt-10 grid max-w-lg grid-cols-6 justify-center content-center items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-6">
                <img class="col-span-2 max-h-40 w-full object-contain lg:col-span-1" src="/img/html.png" alt="Transistor"
                    width="200" height="100">
                <img class="col-span-2 max-h-40 w-full object-contain lg:col-span-1" src="/img/css.png" alt="Reform"
                    width="158" height="48">
                <img class="col-span-2 max-h-40 w-full object-contain lg:col-span-1" src="/img/js.png" alt="Tuple"
                    width="158" height="48">
                <img class="col-span-2 max-h-40 w-full object-contain lg:col-span-1" src="/img/php.png" alt="SavvyCal"
                    width="158" height="48">
                <img class="col-span-2 max-h-40 w-full object-contain lg:col-span-1" src="/img/tailwindd.png" alt="SavvyCal"
                    width="158" height="48">
                <img class="col-span-2 max-h-40 w-full object-contain lg:col-span-1" src="/img/laravel.png" alt="SavvyCal"
                    width="158" height="48">
            </div>
        </div>
    </div>
    {{-- project Section End --}}
@endsection
