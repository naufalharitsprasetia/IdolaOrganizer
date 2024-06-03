@extends('layouts.main')

@section('content')
    {{--  --}}
    <div class="bg-primary">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 sm:py-6 lg:px-8">
            <div
                class="relative isolate overflow-hidden bg-fifth px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                <svg viewBox="0 0 1024 1024"
                    class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
                    aria-hidden="true">
                    <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                        fill-opacity="0.7" />
                    <defs>
                        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                            <stop stop-color="#7775D6" />
                            <stop offset="1" stop-color="#E935C1" />
                        </radialGradient>
                    </defs>
                </svg>
                <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Boost your productivity.<br>Start
                        using our app today.</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-300">Ac euismod vel sit maecenas id pellentesque eu sed
                        consectetur. Malesuada adipiscing sagittis vel nulla.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                        <a href="#"
                            class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get
                            started</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-white">Learn more <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
                <div class="relative mt-16 h-80 lg:mt-8">
                    <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10"
                        src="https://tailwindui.com/img/component-images/dark-project-app-screenshot.png"
                        alt="App screenshot" width="1824" height="1080">
                </div>
            </div>
        </div>
    </div>

    {{--  --}}
    {{-- Hero Section Start --}}
    <section id="hero" class="pt-24 pb-28 text-center items-center bg-primary text-fourth w-full">
        <div class="container mx-auto">
            <div class="flex flex-col">
                <div class="flex ">
                    <img src="/img/hero.png" class="w-96 mx-auto " alt="" data-tilt data-tilt-glare
                        data-tilt-max-glare="0.8">
                </div>
                <h2 class="py-2 px-2 text-3xl font-semibold">Tulis, Rencanakan, dan Kelola Organisasi-mu
                    Dengan
                    Mudah</h2>
                <h3 class="py-2 px-2 text-xl font-medium">Ubah idemu menjadi aksi !! </h3>
            </div>
        </div>
    </section>
    {{-- Hero Section End --}}
    {{-- @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif --}}
    {{-- About Section Start --}}
    <section id="about" class="pt-24 pb-28 w-full bg-third">
        <div class="container mx-auto">
            <div class="flex">
                <div class="px-10 w-1/2 mx-auto">
                    <h2 class="font-bold text-3xl text-slate-800 pb-5">About Us</h2>
                    <p class="font-semibold text-base text-primary opacity-90">Lorem, ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Eos eaque ullam minima cumque, molestias laboriosam nostrum iure itaque perspiciatis. Sapiente
                        nam
                        cumque, doloremque dolore veniam distinctio repellat aliquam quam fugit laudantium neque fugiat,
                        provident inventore quae reiciendis? Quas dolores ipsam quisquam, blanditiis magni, eaque, odio
                        velit
                        provident consequatur ipsum placeat.</p>
                </div>
                <div class="px-10 w-1/2 mx-auto flex justify-center items-center">
                    <img src="/img/logox.png" class="h-auto max-w-full" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- About Section End --}}
    {{-- Testimoni Section Start --}}
    <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div
            class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20">
        </div>
        <div
            class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center">
        </div>
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <h2 class="text-center font-semibold text-gray-900 text-2xl border-dashed border-y  -2 border-gray-900">
                Testimoni
            </h2>
            {{-- <img class="mx-auto h-12" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600.svg" alt=""> --}}
            <figure class="mt-10">
                <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                    <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias
                        molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                </blockquote>
                <figcaption class="mt-10">
                    <img class="mx-auto h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                        <div class="font-semibold text-gray-900">Judith Black</div>
                        <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="text-gray-600">CEO of Workcation</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>

    {{-- Testimoni Section End --}}
    {{-- Section Start --}}
    {{-- Section End --}}
@endsection
