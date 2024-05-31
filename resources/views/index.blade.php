@extends('layouts.main')

@section('content')
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
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- About Section Start --}}
    <section id="about" class="pt-24 pb-28 w-full bg-third">
        <div class="container mx-auto">
            <div class="flex">
                <div class="px-10 w-1/2">
                    <h2 class="font-bold text-2xl text-primary">About Us</h2>
                    <p class="font-semibold text-base text-primary opacity-90">Lorem, ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Eos eaque ullam minima cumque, molestias laboriosam nostrum iure itaque perspiciatis. Sapiente
                        nam
                        cumque, doloremque dolore veniam distinctio repellat aliquam quam fugit laudantium neque fugiat,
                        provident inventore quae reiciendis? Quas dolores ipsam quisquam, blanditiis magni, eaque, odio
                        velit
                        provident consequatur ipsum placeat.</p>
                </div>
                <div class="px-10 w-1/2">
                    <img src="/img/hero.png" class="w-96" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- About Section End --}}
    {{-- Testimoni Section Start --}}
    <section id="testimoni" class="pt-24 pb-28 w-full bg-secondary">
        <div class="container">
            <div class="w-full text-center">
                <h2>Testimoni</h2>
            </div>
        </div>
    </section>
    {{-- Testimoni Section End --}}
@endsection
