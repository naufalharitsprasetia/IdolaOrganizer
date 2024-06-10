@extends('layouts.main')

@section('content')
    {{-- organization section --}}
    <section id="organization" class="pt-14 pb-28 bg-primary text-fourth w-full md:px-20">
        <div class="container-mx-auto">
            <a href="/profile" class="button-secondary shadow-lg">Kembali</a>
            <h2 class="text-2xl font-semibold border-dashed border-2 border-fourth inline-block p-2 mt-4 md:mt-0">Edit Profil
            </h2>
            {{-- Form Start --}}
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-2" action="/edit-profile/{{ $user->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-third">Nama Lengkap</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" autocomplete="name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 @error('name')
                                input-wrong
                            @enderror placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fourth sm:text-sm sm:leading-6"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="label-error bg-white mt-3">
                                    error : {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-third">Alamat Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" readonly
                                class="block w-full rounded-md border-0 py-1.5 bg-slate-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 @error('email')
                                input-wrong
                            @enderror placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fourth sm:text-sm sm:leading-6"
                                value="{{ $user->email }}">

                        </div>
                    </div>
                    {{-- password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-third">password (jika ingin
                            iubah)</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password"
                                class="block w-full rounded-md border-0 py-1.5 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 @error('password')
                                input-wrong
                            @enderror placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fourth sm:text-sm sm:leading-6"
                                value="">

                        </div>
                    </div>

                    {{-- Gender --}}
                    <div class="">
                        <div class="flex items-center justify-between">
                            <label for="gender" class="block text-sm font-medium leading-6 text-third">Gender</label>
                        </div>
                        <div class="mt-2">
                            <select id="gender" name="gender"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 @error('gender')
                                input-wrong
                            @enderror placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fourth sm:text-sm sm:leading-6"
                                required>
                                @if (old('gender', $user->gender) == 'male')
                                    <option value="male" selected>Laki-Laki</option>
                                    <option value="female">Perempuan</option>
                                @else
                                    <option value="male">Laki-Laki</option>
                                    <option value="female" selected>Perempuan</option>
                                @endif
                            </select>
                            @error('gender')
                                <div class="label-error bg-white mt-3">
                                    error : {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{--  --}}

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-fourth px-3 py-1.5 text-sm font-semibold leading-6 text-primary shadow-sm hover:bg-fourth focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fourth">Perbarui</button>
                    </div>
                </form>
            </div>
            {{-- End --}}
        </div>
    </section>
@endsection
