@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <a href="/member/{{ $member->id }}?org={{ $organization->id }}"
            class="button-primary md:absolute md:right-2 md:top-2">Back</a>
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Ubah Data Member - Departement :
            {{ $departement->name_departement }} - ({{ $organization->singkatan_organization }})</h2>

        {{-- Form Start --}}
        <form class="space-y-6" action="/member/edit/{{ $member->id }}" method="POST">
            @method('put')
            @csrf
            {{-- <input type="hidden" name="position_id" value="{{ $position->id }}"> --}}
            <input type="hidden" name="departements_id" value="{{ $departement->id }}">
            <input type="hidden" name="organization_id" value="{{ $organization->id }}">
            {{-- Input 1 --}}
            <div>
                <label for="name_departement" class="text-primary font-bold">Departement*</label>
                <div class="mt-2">
                    <input id="name_departement" type="text" class="input-form-group bg-slate-300" readonly
                        value="{{ $departement->name_departement }}">
                </div>
            </div>
            {{-- Input 2 --}}
            <div>
                <label for="name_member" class="text-primary font-bold">Nama Lengkap Member*</label>
                <div class="mt-2">
                    <input id="name_member" name="name_member" type="text" required
                        class="input-form-group @error('name_member')
                                input-wrong
                            @enderror "
                        value="{{ old('name_member', $member->name_member) }}">
                    @error('name_member')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input  3 --}}
            <div>
                <label for="phone_member" class="text-primary font-bold">Nomer Handphone (optional)</label>
                <div class="mt-2">
                    <input id="phone_member" name="phone_member" type="text"
                        class="input-form-group @error('phone_member')
                                input-wrong
                            @enderror "
                        value="{{ old('phone_member', $member->phone_member) }}">
                    @error('phone_member')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input  4 --}}
            <div>
                <label for="email_member" class="text-primary font-bold">Email (optional)</label>
                <div class="mt-2">
                    <input id="email_member" name="email_member" type="email"
                        class="input-form-group @error('email_member')
                                input-wrong
                            @enderror "
                        value="{{ old('email_member', $member->email_member) }}">
                    @error('email_member')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input  5 --}}
            <div>
                <label for="address_member" class="text-primary font-bold">Alamat (optional)</label>
                <div class="mt-2">
                    <input id="address_member" name="address_member" type="text"
                        class="input-form-group @error('address_member')
                                input-wrong
                            @enderror "
                        value="{{ old('address_member', $member->address_member) }}">
                    @error('address_member')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input  5 --}}
            <div>
                <label for="description" class="text-primary font-bold">Lainnya (optional)</label>
                <div class="mt-2">
                    <input id="description" name="description" type="text"
                        class="input-form-group @error('description')
                                input-wrong
                            @enderror "
                        value="{{ old('description', $member->description) }}">
                    @error('description')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input  6 --}}
            <div class="sm:col-span-3">
                <label for="position_id" class="block leading-6 text-primary font-bold">Posisi</label>
                <div class="mt-2">
                    <select id="position_id" name="position_id"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                        required>
                        {{--  --}}
                        @foreach ($positions as $position)
                            @if (old('position_id', $member->position_id) == $position->id)
                                <option value="{{ $position->id }}" selected>{{ $position->name_positions }}</option>
                            @else
                                <option value="{{ $position->id }}">{{ $position->name_positions }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" class="button-primary">Perbarui</button>
            </div>

        </form>
        {{-- Form End --}}
    </div>
@endsection
