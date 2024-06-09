    @extends('neolayout.main')

    @section('content')
        {{-- organization section --}}
        <div class="struktur-organization relative">
            <a href="/struktur/{{ $departement->id }}" class="button-primary md:absolute md:right-2 md:top-2">Back</a>
            <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Edit Position - Departement :
                {{ $departement->name_departement }} - ({{ $organization->singkatan_organization }})</h2>

            {{-- Form Start --}}
            <form class="space-y-6" action="/posisi-edit/{{ $position->id }}" method="POST">
                @csrf
                @method('put')
                {{-- <input type="hidden" name="organization_id" value="{{ $organization->id }}"> --}}
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
                    <label for="name_positions" class="text-primary font-bold" style="overflow-wrap: anywhere">Posisi*
                        (contoh:
                        Ketua; bag.sekretaris;
                        bag.perlengkapan)</label>
                    <div class="mt-2">
                        <input id="name_positions" name="name_positions" type="text" required
                            class="input-form-group @error('name_positions')
                                input-wrong
                            @enderror "
                            value="{{ old('name_positions', $position->name_positions) }}">
                        @error('name_positions')
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
                            value="{{ old('description', $position->description) }}">
                        @error('description')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- Input 3 --}}
                <div class="sm:col-span-3">
                    <label for="parent_id" class="block leading-6 text-primary font-bold">Parent ID <button type="button"
                            onclick="openModal('exampleModal')"
                            class=" mx-2 text-sm font-medium    
                        text-blue-500">(Penjelasan)</button></label>
                    <div class="mt-2">
                        <select id="parent_id" name="parent_id"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">NONE</option>
                            @foreach ($positions as $posisi)
                                @if (old('parent_id', $position->parent_id) == $posisi->id)
                                    <option value="{{ $posisi->id }}" selected>{{ $posisi->name_positions }}</option>
                                @else
                                    <option value="{{ $posisi->id }}">{{ $posisi->name_positions }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                <div>
                    <button type="submit" class="button-primary">Perbarui Posisi</button>
                </div>

            </form>
            {{-- Form End --}}
        </div>
        <x-modal id="exampleModal">
            <x-slot name="title">
                PARENT ID
            </x-slot>
            Parent ID adalah konsep yang digunakan dalam desain database untuk merepresentasikan relasi hierarki atau
            berjenjang
            antara entitas dalam tabel yang sama. Ini biasanya diterapkan dalam struktur data seperti pohon (tree) atau
            daftar
            berjenjang (nested list)
            <br><br>
            Contoh Struktur Hierarki
            <br>
            <div class="">
                <span>(id=1) | bag. Pengembangan | (parent_id = null)</span>
                <ul>
                    <li> | sub. bag. IT | (parent_id = 1)</li>
                    <li> | sub. bag. Riset dan Inovasi | (parent_id = 1)</li>
                </ul>
            </div>
        </x-modal>
    @endsection
