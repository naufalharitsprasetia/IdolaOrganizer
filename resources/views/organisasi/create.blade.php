@extends('layouts.main')

@section('content')
    <section id="organization" class="pt-14 pb-28 bg-primary text-fourth w-full px-20">

        <div class="container-mx-auto">
            <a href="/organisasi" class="button-secondary shadow-lg">Back</a>
            <h2 class="text-2xl font-semibold border-dashed border-2 border-fourth inline-block p-2 mt-4 md:mt-0">Buat
                Organisasi Baru
            </h2>
            {{-- Form Start --}}
            <form class="space-y-6" action="" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Input 1 --}}
                <div>
                    <label for="name_organization" class="text-fourth font-bold">Nama Organisasi*</label>
                    <div class="mt-2">
                        <input id="name_organization" name="name_organization" type="text" required
                            class="input-form-group @error('name_organization')
                                input-wrong
                            @enderror "
                            value="{{ old('name_organization') }}">
                        @error('name_organization')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- Input 2 --}}
                <div>
                    <label for="description_organization" class="text-fourth font-bold">Deskripsi
                        Organisasi*</label>
                    <div class="mt-2">
                        <input id="description_organization" name="description_organization" type="text" required
                            class="input-form-group @error('description_organization')
                                input-wrong
                            @enderror "
                            value="{{ old('description_organization') }}">
                        @error('description_organization')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- Input 2 --}}
                <div>
                    <label for="singkatan_organization" class="text-fourth font-bold">Singkatan
                        Organisasi*</label>
                    <div class="mt-2">
                        <input id="singkatan_organization" name="singkatan_organization" type="text" required
                            class="input-form-group @error('singkatan_organization')
                                input-wrong
                            @enderror "
                            value="{{ old('singkatan_organization') }}">
                        @error('singkatan_organization')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- Input 3 --}}
                {{-- <div>
                    <label for="logo" class="label-input-group">Logo Organisasi*</label>
                    <div class="mt-2">
                        <input id="logo" name="logo" type="file" required
                            class="bg-white text-primary placeholder:text-primary rounded-lg  @error('logo')
                                input-wrong
                            @enderror "
                            value="{{ old('logo') }}">
                        @error('logo')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div> --}}
                {{--  --}}
                <style>
                    /* Custom styling to hide the default input file */
                    .file-input {
                        display: none;
                    }
                </style>
                <div class="bg-white px-3 py-3 rounded-lg shadow-lg">
                    <span class="text-primary font-bold">Logo Organinsasi*</span>
                    <label for="logo_organization"
                        class="cursor-pointer flex items-center justify-center px-4 py-2 my-4 bg-primary text-white rounded-lg hover:bg-primary">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Upload File
                    </label>
                    <input id="logo_organization" type="file" name="logo_organization" class="file-input">
                    <span class="text-primary font-bold">Nama file :</span><span id="file-name"
                        class="ml-4 text-gray-600 text-primary font-bold"></span>
                </div>

                <div>
                    <button type="submit"
                        class="shadow-xl flex w-1/3 justify-center rounded-md bg-fourth px-3 py-1.5 text-sm font-semibold leading-6 text-primary shadow-sm hover:bg-third focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary">Daftar</button>
                </div>

            </form>
            {{-- Form End --}}
        </div>
    </section>
    <script>
        document.getElementById('logo_organization').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
@endsection
