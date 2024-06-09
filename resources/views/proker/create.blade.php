@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <a href="/struktur/{{ $departement->id }}" class="button-primary md:absolute md:right-2 md:top-2">Back</a>
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Create Program Kerja - Departement :
            {{ $departement->name_departement }} - ({{ $organization->singkatan_organization }})</h2>

        {{-- Form Start --}}
        <form class="space-y-6" action="/proker/create" method="POST">
            @csrf
            <input type="hidden" name="departements_id" value="{{ $departement->id }}">
            {{-- Input 1 --}}
            <div>
                <label for="name_departement" class="text-primary font-bold">Departement*</label>
                <div class="mt-2">
                    <input id="name_departement" type="text" class="input-form-group bg-slate-300" readonly
                        value="{{ $departement->name_departement }}">
                </div>
            </div>
            {{-- Input  --}}
            <div>
                <label for="name_program" class="text-primary font-bold">Program Kerja</label>
                <div class="mt-2">
                    <input id="name_program" name="name_program" type="text" required
                        class="input-form-group @error('name_program')
                                input-wrong
                            @enderror "
                        value="{{ old('name_program') }}">
                    @error('name_program')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input  --}}
            {{-- Input 2 --}}
            <div>
                <label for="description" class="text-primary font-bold">Deskripsi (optional)</label>
                <div class="mt-2">
                    <input id="description" name="description" type="text"
                        class="input-form-group @error('description')
                                input-wrong
                            @enderror "
                        value="{{ old('description') }}">
                    @error('description')
                        <div class="label-error">
                            error : {{ $message }}s
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input 3 --}}
            <div>
                <label for="start_date" class="text-primary font-bold">Start Date</label>
                <div class="mt-2">
                    <input id="start_date" name="start_date" type="date" required
                        class="input-form-group @error('start_date')
                                input-wrong
                            @enderror "
                        value="{{ old('start_date') }}">
                    @error('start_date')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input 4 --}}
            <div>
                <label for="end_date" class="text-primary font-bold">End Date</label>
                <div class="mt-2">
                    <input id="end_date" name="end_date" type="date" required
                        class="input-form-group @error('end_date')
                                input-wrong
                            @enderror "
                        value="{{ old('end_date') }}">
                    @error('end_date')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- INput 4 --}}
            <div class="sm:col-span-3">
                <label for="status_program" class="block leading-6 text-primary font-bold">Status </label>
                <div class="mt-2">
                    <select id="status_program" name="status_program"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="notyet" selected>Belum Selesai (Default)</option>
                        <option value="pending">Sedang Dikerjakan</option>
                        <option value="progress">Tertunda</option>
                        <option value="completed">Selesai</option>
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" class="button-primary">Tambahkan Program Kerja</button>
            </div>

        </form>
        {{-- Form End --}}
    </div>
@endsection
