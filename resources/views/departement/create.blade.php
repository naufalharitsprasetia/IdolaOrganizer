@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <a href="/struktur?org={{ $organization->id }}" class="button-primary absolute right-2 top-2">Back</a>
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Struktur Organisasi</h2>
        {{-- Form Start --}}
        <form class="space-y-6" action="/struktur/create" method="POST">
            @csrf
            <input type="hidden" name="organization_id" value="{{ $organization->id }}">
            {{-- Input 1 --}}
            <div>
                <label for="name_departement" class="text-primary font-bold">Nama Departement*</label>
                <div class="mt-2">
                    <input id="name_departement" name="name_departement" type="text" required
                        class="input-form-group @error('name_departement')
                                input-wrong
                            @enderror "
                        value="{{ old('name_departement') }}">
                    @error('name_departement')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input 2 --}}
            <div>
                <label for="description" class="text-primary font-bold">Deskripsi
                    *</label>
                <div class="mt-2">
                    <input id="description" name="description" type="text" required
                        class="input-form-group @error('description')
                                input-wrong
                            @enderror "
                        value="{{ old('description') }}">
                    @error('description')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input 2 --}}
            {{-- Input 3 --}}
            <div class="sm:col-span-3">
                <label for="parent_id" class="block leading-6 text-primary font-bold">Parent ID <a href=""
                        class=" mx-2 text-sm font-medium text-blue-500">(Penjelasan)</a></label>
                <div class="mt-2">
                    <select id="parent_id" name="parent_id"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">NONE</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->name_departement }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div>
                <button type="submit" class="button-primary">Tambahkan Departement</button>
            </div>

        </form>
        {{-- Form End --}}
    </div>
@endsection
