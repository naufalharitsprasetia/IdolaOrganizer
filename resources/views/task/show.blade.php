@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Detail Tugas</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/task-edit/{{ $task->id }}?dept={{ $departement->id }}" class="button-primary">Ubah Data</a>
        <form action="/task-delete/{{ $task->id }}?dept={{ $departement->id }}" class="inline"
            id="formDelete-{{ $task->id }}" method="POST">
            @method('delete')
            @csrf
            <button type="button" onclick="deleteConfirm({{ $task->id }})"
                class="text-white bg-rose-600 px-2 py-1 rounded-lg hover:opacity-80">Hapus
            </button>
        </form>
        <a href="/struktur/{{ $departement->id }}" class="button-primary absolute right-1 top-1">Back</a>

        <div>
            <div class="mt-2 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama Tugas</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $task->name_task }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Departement</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $task->departement->name_departement }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Deskripsi</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $task->description }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Deadline</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $task->due_date }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Status</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $task->status_task }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Penanggung Jawab</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            @if (isset($task->member->name_member))
                                {{ $task->member->name_member }}
                            @else
                                -
                            @endif
                        </dd>
                    </div>


                </dl>
            </div>
        </div>
    </div>
@endsection
