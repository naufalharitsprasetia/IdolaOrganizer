<header class="bg-fourth text-primary w-full sticky relative top-0 z-50"
    style="box-shadow: 0px 0px 10px 0px black !important;">
    <nav class="hidden md:flex justify-between py-3 px-4 items-center">
        {{-- kiri Nav --}}
        {{-- Logo --}}
        <div class="flex">
            <a href="#" class="ml-14 mr-10">
                <img src="/img/logox.png" class="w-20" alt="">
            </a>
            {{-- <a href="" class="text-xl font-bold text-yellow-900 mr-10 ml-2">IdolaOrganizer</a> --}}
            <ul class="flex items-center font-semibold">
                <li class="mx-2 hover:text-yellow-800 {{ $active === 'home' ? 'text-yellow-800' : '' }}">
                    <a href="/"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="mx-2 hover:text-yellow-800 {{ $active === 'organisasi' ? 'text-yellow-800' : '' }}">
                    <a href="/organisasi"><i class="fa-solid fa-sitemap"></i> Manage Your Organization</a>
                </li>
                <li class="mx-2 hover:text-yellow-800 {{ $active === 'about' ? 'text-yellow-800' : '' }}">
                    <a href="/about"><i class="fa-solid fa-circle-info"></i> About</a>
                </li>
                <li class="mx-2 hover:text-yellow-800 {{ $active === 'contact' ? 'text-yellow-800' : '' }}">
                    <a href="/contact"><i class="fa-solid fa-id-card"></i> Contact Us</a>
                </li>
                <span
                    class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Versi
                    1.0</span>
            </ul>
        </div>
        {{-- Right Nav --}}
        <div>
            @guest
                <div class="flex font-semibold">
                    <a href="/login" class="button-primary">Login</a>
                    <a href="/register" class="button-secondary">Register</a>
                </div>
            @endguest
            @auth
                <div class="flex font-semibold items-center">
                    <div class="px-3">
                        <h3><span id="welcome-back"></span> {{ auth()->user()->name }}</h3>
                    </div>
                    {{-- Dropdown --}}
                    <div class="relative inline-block text-left px-2">
                        <div>
                            <button type="button"
                                class="w-full justify-center rounded-full shadow-sm overflow-hidden border-2 border-third focus:ring-2 focus:ring-primary hover:-translate-x-1 transition duration-300"
                                aria-expanded="true" aria-haspopup="true">
                                <img src="/img/avatar.jpg" alt="" class="w-10 " id="menu-button">
                            </button>
                        </div>
                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300"
                                    role="menuitem" tabindex="-1">Profile</a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="button"
                                        class="text-gray-700 block w-full px-4 py-2 text-left text-sm hover:bg-gray-300"
                                        role="menuitem" tabindex="-1" id="menu-item-3"
                                        onclick="confirmLogout()">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Dropdown --}}
                </div>
            @endauth
        </div>
    </nav>
    <nav class="relative flex md:hidden justify-between py-3 px-4 items-center">
        <div class="logo">
            <a href="/">
                <img src="/img/logox.png" class="w-20" alt="">
            </a>
        </div>
        {{-- Dropdown --}}
        <div class="relative inline-block">
            {{-- <i class="fa-solid fa-bars fa-lg" id="burger-menu"></i> --}}
            <button type="button" class="hover:-rotate-90 transition ease-in-out duration-300 text-primary"
                id="burger-menu"></button>
            <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
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
                                class="text-gray-700 block w-full px-4 py-2 text-left text-sm hover:bg-gray-300"
                                role="menuitem" tabindex="-1" id="menu-item-3"
                                onclick="confirmLogout()">Logout</button>
                        </form>
                    @else
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 "
                            role="menuitem" tabindex="-1">Login</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300 "
                            role="menuitem" tabindex="-1">Register</a>
                    @endauth
                </div>
            </div>
        </div>
        {{-- End Dropdown --}}
    </nav>
</header>
