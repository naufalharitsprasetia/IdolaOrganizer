@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization relative">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Detail Member</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/member/edit/{{ $member->id }}?dept={{ $departement->id }}" class="button-primary">Ubah Data</a>
        <a href="/struktur/{{ $departement->id }}" class="button-primary absolute right-1 top-1">Back</a>

        <div>
            <div class="mt-2 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama Lengkap</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $member->name_member }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nomer Handphone</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $member->phone_member }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Alamat Email</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $member->email_member }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Alamat</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $member->address_member }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Departement</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $member->departement->name_departement }} ({{ $member->position->name_positions }})</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tersinkron Dengan User</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            @if ($member->user_id != null)
                                ({{ $member->user->email }})
                                <p class="text-white bg-green-400 px-2 py-1 rounded-lg inline-block">
                                    Telah
                                    Sinkron</p>
                            @else
                                <button data-member-id="{{ $member->id }}"
                                    data-member-email="{{ $member->email_member }}" type="button"
                                    class="sync-button text-white bg-rose-500 px-2 py-1 inline-block rounded-lg hover:opacity-80">Belum
                                    Sinkron</button>
                            @endif
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Lainnya</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $member->description }}
                        </dd>
                    </div>


                </dl>
            </div>
        </div>
    </div>
    <!-- Modal Input Email -->
    <div id="syncModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl mb-4">Sync Member</h2>
            <p class="text-xs mb-2 text-red-500">ubah data member untuk mengganti email dibawah</p>
            <form id="syncForm" method="POST" action="{{ route('member.sync') }}">
                @csrf
                <input type="hidden" name="member_id" id="member_id">
                <input type="hidden" name="organization_id" id="organization_id" value="{{ $organization->id }}">
                <label for="email" class="block text-sm font-medium text-gray-700">User Email</label>
                <input type="email" name="email" id="email" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <div class="mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Sync</button>
                    <button type="button" class="close-modal bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Script --}}
    <script>
        // Buka Modal Sync
        document.querySelectorAll('.sync-button').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('member_id').value = this.getAttribute('data-member-id');
                document.getElementById('email').value = this.getAttribute('data-member-email');
                document.getElementById('syncModal').classList.remove('hidden');
            });
        });

        // Tutup Modal
        document.querySelector('.close-modal').addEventListener('click', function() {
            document.getElementById('syncModal').classList.add('hidden');
        });
    </script>
@endsection
