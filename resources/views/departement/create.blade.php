@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization">
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
            <div>
                <label for="parent_id" class="text-primary font-bold">Parent ID
                </label>
                <div class="mt-2">
                    <input id="parent_id" name="parent_id" type="text"
                        class="input-form-group @error('parent_id')
                                input-wrong
                            @enderror "
                        value="{{ old('parent_id') }}">
                    @error('parent_id')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div>
                <button type="submit" class="button-primary">Tambahkan Departement</button>
            </div>

        </form>
        {{-- Form End --}}
    </div>
@endsection
