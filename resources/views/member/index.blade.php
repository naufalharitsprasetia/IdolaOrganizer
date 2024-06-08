@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Anggota</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- <div class="button-secondary font-medium text-wrap my-3 text-center">
            <a href="/member/create?org={{ $organization->id }}" class="">Tambahkan Program Kerja</a>
        </div> --}}
        <hr class="border-primary border-2">
        <br>
        {{--  --}}
        <div class="container mx-auto px-4">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">Anggota Organisasi</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Department</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Nama</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Email</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    No Handphone</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Posisi</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Status Sinkron</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departements as $department)
                                @foreach ($department->members as $member)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $department->name_departement }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $member->name_member }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $member->email_member }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $member->phone_member }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $member->position->name_positions }}
                                        </td>
                                        <td class=" bg-white">
                                            @if ($member->user_id != null)
                                                <p class="text-white bg-green-400 px-2 py-1 rounded-lg ">
                                                    Telah
                                                    Sinkron</p>
                                            @else
                                                <button data-member-id="{{ $member->id }}"
                                                    class="sync-button text-white bg-rose-500 px-2 py-1 rounded-lg hover:opacity-80">Belum
                                                    Sinkron</button>
                                            @endif
                                        </td>
                                        <td class=" bg-white">
                                            <div class="flex flex-wrap gap-1 bg-white">
                                                <a href="/member/{{ $member->id }}?org={{ $organization->id }}"
                                                    class="text-white bg-blue-600 px-2 py-1 rounded-lg hover:opacity-80">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal Input Email -->
    <div id="syncModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl mb-4">Sync Member</h2>
            <form id="syncForm" method="POST" action="{{ route('sync.member') }}">
                @csrf
                <input type="hidden" name="member_id" id="member_id">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
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
                document.getElementById('syncModal').classList.remove('hidden');
            });
        });

        // Tutup Modal
        document.querySelector('.close-modal').addEventListener('click', function() {
            document.getElementById('syncModal').classList.add('hidden');
        });
    </script>
@endsection
