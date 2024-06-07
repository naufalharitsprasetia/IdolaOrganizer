<div class="hidden top-[8vh] md:top-0 md:block sidebar-container py-3 px-3 w-[30vw] md:w-[22vw] h-full fixed bg-fourth"
    role="navbar">
    <div class="flex flex-col">
        {{-- logo --}}
        <a href="#" class="my-1 mx-1"><img src="/img/logox.png" class="w-[10rem] h-auto my-2 mx-1" alt=""></a>
        <hr class="border-2 border-primary">
        {{--  --}}
        <ul class="md:p-2 md:mx-2 font-semibold text-sm md:text-base text-primary ">
            <li class="my-1 py-2 hover:text-sixth ">
                <a href="/organisasi"><i class="fa-solid fa-left-long fa-beat-fade"></i> Back</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'dashboard' ? 'text-sixth' : '' }}">
                <a href="/organisasi/{{ $organization->id }}"><i class="fa-solid fa-table-columns fa-bounce"></i>
                    Dashboard</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'struktur' ? 'text-sixth' : '' }}">
                <a href="/struktur?org={{ $organization->id }}"><i class="fa-solid fa-sitemap fa-fade"></i> Struktur</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'proker' ? 'text-sixth' : '' }}">
                <a href="/proker?org={{ $organization->id }}"><i class="fa-solid fa-lightbulb fa-spin-pulse"></i>
                    Program Kerja</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'member' ? 'text-sixth' : '' }}">
                <a href="/member?org={{ $organization->id }}"><i class="fa-solid fa-people-group fa-flip"></i>
                    Anggota</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'events' ? 'text-sixth' : '' }}">
                <a href="/event?org={{ $organization->id }}"><i class="fa-solid fa-calendar-days fa-shake"></i>
                    Kegiatan</a>
            </li>
        </ul>
        <hr class="border-2 border-primary">
        <ul class="flex flex-col justify-center items-center p-2 mx-2 font-semibold text-base text-primary ">
            <li class="mx-auto text-center">
                <img src="{{ asset('/storage' . '/' . $organization->logo_organization) }}" class="w-20"
                    alt="">
                {{ $organization->singkatan_organization }}
            </li>
        </ul>
        <hr class="border-2 border-primary">
        <ul class="p-2 mx-2 font-semibold text-base text-primary">
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'profile' ? 'text-sixth' : '' }}">
                <a href="/profile"><i class="fa-solid fa-user"></i> Profil</a>
            </li>
            {{-- <li class="my-2 py-2 hover:text-sixth">
                <a href=""><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </li> --}}
        </ul>

    </div>
</div>
<nav class=" flex md:hidden justify-between py-3 px-4 items-center bg-fourth sticky z-50 top-0"
    style="    box-shadow: 0px 0px 10px 0px black !important;">

    {{-- Dropdown --}}
    <div class="relative inline-block">
        {{-- <i class="fa-solid fa-bars fa-lg" id="burger-menu"></i> --}}
        <button type="button" class="hover:-rotate-90 transition ease-in-out duration-300 text-primary"
            id="burger-menu">🟰</button>
        {{-- <div class="absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
            role="navbar" aria-orientation="vertical" tabindex="-1">
            <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="/"
                    class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 {{ $active === 'home' ? 'bg-gray-300' : '' }}"
                    role="menuitem" tabindex="-1">Home</a>
                <a href="/organisasi"
                    class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300  {{ $active === 'organisasi' ? 'bg-gray-300' : '' }}"
                    role="menuitem" tabindex="-1">Organization</a>
                <a href="/about"
                    class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 {{ $active === 'about' ? 'bg-gray-300' : '' }}"
                    role="menuitem" tabindex="-1">About</a>
                <a href="/contact"
                    class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 {{ $active === 'contact' ? 'bg-gray-300' : '' }}"
                    role="menuitem" tabindex="-1">Contact Us</a>
                <hr>
                @auth
                    <a href="#"
                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 {{ $active === 'profile' ? 'bg-gray-300' : '' }}"
                        role="menuitem" tabindex="-1"><span id="welcome-back-responsive">
                        </span><br>{{ auth()->user()->name }}</a>
                    <hr>
                    <a href="#"
                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 {{ $active === 'profile' ? 'bg-gray-300' : '' }}"
                        role="menuitem" tabindex="-1">Profile</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="button"
                            class="text-gray-700 block w-full px-4 py-2 text-left text-sm hover:bg-gray-300" role="menuitem"
                            tabindex="-1" id="menu-item-3" onclick="confirmLogout()">Logout</button>
                    </form>
                @else
                    <a href="/login" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 " role="menuitem"
                        tabindex="-1">Login</a>
                    <a href="/register" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 " role="menuitem"
                        tabindex="-1">Register</a>
                @endauth
            </div>
        </div> --}}
    </div>
    {{-- End Dropdown --}}
    {{-- Logo --}}
    <div class="logo">
        <a href="/">
            <img src="/img/logox.png" class="w-20" alt="">
        </a>
    </div>
    {{-- End Logo --}}
</nav>
