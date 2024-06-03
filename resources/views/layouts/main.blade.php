@include('layouts.header')

{{-- Sweet Alert --}}
@include('sweetalert::alert')

{{-- Nav --}}

@include('layouts.navbar')

{{-- Nav --}}
{{-- CONTENT --}}
@yield('content')
{{-- CONTENT --}}
@include('layouts.footer')
