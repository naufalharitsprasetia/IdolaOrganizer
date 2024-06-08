@extends('neolayout.main')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Kalender Event</h1>
        <div id="calendar"></div>
    </div>
    <!-- Modal -->
    <div id="eventModal" class="modal">
        <div class="modal-content">
            <span>Title :</span>
            <span class="close">&times;</span>
            <h2 id="eventTitle"></h2>
            <br>
            <span>Deskripsi :</span>
            <p id="eventDescription"></p>
            <br>
            <p id="eventDateStart"></p>
            <p id="eventDateEnd"></p>
            <br>
            <p id="eventLocation"></p>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.10.1/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/event/list?org=1',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                eventDidMount: function(info) {
                    // Customize the appearance of events here
                    info.el.style.backgroundColor = 'blue';
                    info.el.style.color = 'white';
                    info.el.style.cursor = 'pointer';
                },
                eventClick: function(info) {
                    info.jsEvent.preventDefault();

                    document.getElementById('eventTitle').innerText = info.event.title;
                    document.getElementById('eventDescription').innerText = info.event.extendedProps
                        .description;
                    document.getElementById('eventLocation').innerText = info.event.extendedProps
                        .location;
                    var startDate = new Date(info.event.start);
                    var formattedStartDate = startDate.toLocaleDateString('id-ID', {
                        weekday: 'long',
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit'
                    });
                    var endDate = new Date(info.event.end);
                    var formattedEndDate = endDate.toLocaleDateString('id-ID', {
                        weekday: 'long',
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit'
                    });
                    document.getElementById('eventDateStart').innerText =
                        `Tanggal Acara Dimulai : ${formattedStartDate}`;
                    document.getElementById('eventDateEnd').innerText =
                        `Tanggal Acara Berakhir : ${formattedEndDate}`;

                    var modal = document.getElementById('eventModal');
                    var span = document.getElementsByClassName('close')[0];

                    modal.style.display = 'block';

                    span.onclick = function() {
                        modal.style.display = 'none';
                    }

                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = 'none';
                        }
                    }
                }
            });

            calendar.render();
        });
    </script>
@endpush

@push('styles')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.10.1/main.min.css" rel="stylesheet">
@endpush
