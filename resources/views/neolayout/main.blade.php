<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logoy.png" type="image/png">
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- Font AWESOME --}}
    <script src="https://kit.fontawesome.com/0e361b3f2b.js" crossorigin="anonymous"></script>
    {{-- own Style CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
    <title>Idola Organizer</title>
</head>

<body class="h-[3000px]">

    {{-- Sweet Alert --}}
    @include('sweetalert::alert')

    {{-- Nav --}}

    {{-- Nav --}}
    @include('neolayout.sidebar')
    {{-- CONTENT --}}
    <div class="hidden ml-[30vw]"></div>
    <div class="md:ml-[22vw] pt-12" id="mainblade">
        <div class=" mb-12 bg-fourth text-primary border-4 border-dashed border-secondary mx-6 rounded-lg p-5">
            @yield('content')
        </div>
        @yield('secondContent')
    </div>
    {{-- CONTENT --}}

    {{-- Script / JS --}}
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script type="text/javascript" src="/js/vanilla-tilt.js"></script>
    <script src="/js/script.js"></script>

</body>

</html>
