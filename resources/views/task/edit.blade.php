@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <a href="/struktur/{{ $departement->id }}" class="button-primary md:absolute md:right-2 md:top-2">Back</a>
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Edit Task - Departement :
            {{ $departement->name_departement }} - ({{ $organization->singkatan_organization }})</h2>

        {{-- Form Start --}}
        <form class="space-y-6" action="/task-edit/{{ $task->id }}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="organization_id" value="{{ $organization->id }}">
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
                <label for="name_task" class="text-primary font-bold">Nama Tugas*</label>
                <div class="mt-2">
                    <input id="name_task" name="name_task" type="text" required
                        class="input-form-group @error('name_task')
                                input-wrong
                            @enderror "
                        value="{{ old('name_task', $task->name_task) }}">
                    @error('name_task')
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
                        value="{{ old('description', $task->description) }}">
                    @error('description')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- Input 3 --}}
            <div>
                <label for="due_date" class="text-primary font-bold">Deadline*</label>
                <div class="mt-2">
                    <input id="due_date" name="due_date" type="date" required
                        class="input-form-group @error('due_date')
                                input-wrong
                            @enderror "
                        value="{{ old('due_date', $task->due_date) }}">
                    @error('due_date')
                        <div class="label-error">
                            error : {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- INput 4 --}}
            <div class="sm:col-span-3">
                <label for="status_task" class="block leading-6 text-primary font-bold">Status </label>
                <div class="mt-2">
                    <select id="status_task" name="status_task"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        @if (old('status_program', $task->status_task) == 'notyet')
                            <option value="notyet" selected>Belum Selesai (Default)</option>
                            <option value="pending">Sedang Dikerjakan</option>
                            <option value="progress">Tertunda</option>
                            <option value="completed">Selesai</option>
                        @elseif(old('status_program', $task->status_task) == 'pending')
                            <option value="notyet">Belum Selesai (Default)</option>
                            <option value="pending" selected>Sedang Dikerjakan</option>
                            <option value="progress">Tertunda</option>
                            <option value="completed">Selesai</option>
                        @elseif(old('status_program', $task->status_task) == 'progress')
                            <option value="notyet">Belum Selesai (Default)</option>
                            <option value="pending">Sedang Dikerjakan</option>
                            <option value="progress" selected>Tertunda</option>
                            <option value="completed">Selesai</option>
                        @elseif(old('status_program', $task->status_task) == 'completed')
                            <option value="notyet">Belum Selesai (Default)</option>
                            <option value="pending">Sedang Dikerjakan</option>
                            <option value="progress">Tertunda</option>
                            <option value="completed" selected>Selesai</option>
                        @else
                            <option value="notyet">Belum Selesai (Default)</option>
                            <option value="pending">Sedang Dikerjakan</option>
                            <option value="progress">Tertunda</option>
                            <option value="completed">Selesai</option>
                        @endif
                    </select>
                </div>
            </div>
            {{-- INput 5 --}}
            <div class="sm:col-span-3">
                <label for="member_id" class="block leading-6 text-primary font-bold">Ditugaskan kepada</label>
                <div class="mt-2">
                    <select id="member_id" name="member_id"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Umum (Semua)</option>
                        @foreach ($members as $member)
                            @if (old('member_id', $task->member_id) == $member->id)
                                <option value="{{ $member->id }}" selected>{{ $member->name_member }}</option>
                            @else
                                <option value="{{ $member->id }}">{{ $member->name_member }}</option>
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
