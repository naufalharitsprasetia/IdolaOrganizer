@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="struktur-organization">
        <h2 class="text-2xl font-semibold mt-1 mb-6 mx-3">Program Kerja</h2>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12 mt-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- <div class="button-secondary font-medium text-wrap my-3 text-center">
            <a href="/proker/create?org={{ $organization->id }}" class="">Tambahkan Program Kerja</a>
        </div> --}}
        <hr class="border-primary border-2">
        <br>
        {{--  --}}
        <div class="container mx-auto px-4">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">Work Programs</h2>
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
                                    Work Program</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Description</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    Start Date</th>
                                <th
                                    class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                    End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departements as $department)
                                @foreach ($department->prokers as $workProgram)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $department->name_departement }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $workProgram->name_program }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $workProgram->start_date }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $workProgram->end_date }}<br><span
                                                class="text-xs">({{ $workProgram->days_remaining }} Hari Lagi)</span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-slate-500 leading-tight">
                                                <span aria-hidden="true"
                                                    class="absolute inset-0  {{ $workProgram->status_program == 'completed' ? 'bg-green-200' : '' }} {{ $workProgram->status_program == 'notyet' ? 'bg-red-400' : '' }} {{ $workProgram->status_program == 'progress' ? 'bg-yellow-300' : '' }} {{ $workProgram->status_program == 'pending' ? 'bg-yellow-500' : '' }} opacity-50 rounded-full"></span>
                                                <span class="relative">{{ $workProgram->status_program }}</span>
                                            </span>
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
@endsection
