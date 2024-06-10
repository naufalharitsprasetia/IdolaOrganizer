@extends('neolayout.main')

@section('content')
    {{-- organization section --}}
    <div class="info-organization">
        <h2 class="mb-2">Nama Organisasi : {{ $organization->name_organization }}</h2>
        <h2 class="mb-2">Singkatan : {{ $organization->singkatan_organization }}</h2>
        <div class="flex my-4">
            <h4 class="mr-4">Logo :</h4>
            @if ($organization->logo_organization == 'img/dema.png')
                <img src="/img/dema.png" class="w-20" alt="">
            @else
                <img src="{{ asset('/storage' . '/' . $organization->logo_organization) }}" class="w-20" alt="">
            @endif
        </div>
        <p>Deskripsi : {{ $organization->description_organization }}</p>
    </div>
    <hr class="border-1 border-primary my-2">
    <div class="info-other flex gap-4 justify-center items-center flex-wrap">
        <div class="card bg-white shadow-lg p-2 rounded-lg text-center mx-4">
            <h3>{{ count($organization->prokers) }}</h3>
            <p>Departement</p>
        </div>
        <div class="card bg-white shadow-lg p-2 rounded-lg text-center mx-4">
            <h3>{{ count($organization->memberss) }}</h3>
            <p>Anggota</p>
        </div>
        <div class="card bg-white shadow-lg p-2 rounded-lg text-center mx-4">
            <h3>{{ count($organization->events) }}</h3>
            <p>Kegiatan</p>
        </div>
        <div class="card bg-white shadow-lg p-2 rounded-lg text-center mx-4">
            <h3>{{ count($organization->prokers) }}</h3>
            <p>Program Kerja</p>
        </div>
    </div>
@endsection
@section('secondContent')
    {{-- Dashboard --}}
    <div class=" mb-12 bg-fourth text-primary border-4 border-dashed border-secondary mx-6 rounded-lg p-5">
        <h2 class="font-bold text-center text-xl underline">Dashboard</h2>
        <h2 class="font-semibold text-base underline my-4">Statistics</h2>

        <h2>Jumlah Anggota per Departemen</h2>
        <canvas id="memberChart"></canvas>

        <h2>Jumlah Proker per Departemen</h2>
        <canvas id="workProgramChart"></canvas>

        <h2>Progress Proker</h2>
        <canvas id="progressChart"></canvas>

        <script>
            var memberCtx = document.getElementById('memberChart').getContext('2d');
            var memberChart = new Chart(memberCtx, {
                type: 'bar',
                data: {
                    labels: @json($departementNames),
                    datasets: [{
                        label: 'Jumlah Anggota',
                        data: @json($memberCounts),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var workProgramCtx = document.getElementById('workProgramChart').getContext('2d');
            var workProgramChart = new Chart(workProgramCtx, {
                type: 'bar',
                data: {
                    labels: @json($departementNames),
                    datasets: [{
                        label: 'Jumlah Proker',
                        data: @json($workProgramCounts),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var progressCtx = document.getElementById('progressChart').getContext('2d');
            var progressData = @json($progressData);

            var labels = progressData.map(function(data) {
                return data.departement;
            });

            var totalData = progressData.map(function(data) {
                return data.total;
            });

            var completedData = progressData.map(function(data) {
                return data.completed;
            });

            var percentageData = progressData.map(function(data) {
                return data.percentage;
            });

            var progressChart = new Chart(progressCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Total Proker',
                            data: totalData,
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Completed Proker',
                            data: completedData,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        // {
                        //     label: 'Percentage Completed',
                        //     data: percentageData,
                        //     backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        //     borderColor: 'rgba(153, 102, 255, 1)',
                        //     borderWidth: 1,
                        //     type: 'pie'
                        // }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
@endsection
