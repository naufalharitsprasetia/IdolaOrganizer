<header class="bg-fourth text-primary w-full">
    <nav class="flex justify-around py-6 px-4 items-center">
        {{-- Logo --}}
        <div class="flex">
            <a href="" class="text-xl font-bold text-primary">IdolaOrganizer</a>
        </div>
        {{-- Mid Nav --}}
        <ul class="flex font-semibold">
            <li class="mx-2">
                <a href="#">Home</a>
            </li>
            <li class="mx-2">
                <a href="#">Product</a>
            </li>
            <li class="mx-2">
                <a href="#">About</a>
            </li>
            <li class="mx-2">
                <a href="#">Contact Us</a>
            </li>
        </ul>
        {{-- Right Nav --}}
        <div>
            @guest
                <div class="flex font-semibold">
                    <a href="/login"
                        class="mx-2 bg-primary text-fourth px-3 py-1 rounded-lg hover:bg-fourth hover:border-2 hover:text-primary hover:border-primary">Login</a>
                    <a href="/register"
                        class="border-primary mx-2 px-3 py-1 rounded-lg hover:opacity-60 border-2 ">Register</a>
                </div>
            @endguest
            @auth
                <div class="flex font-semibold items-center">
                    <div class="px-3">
                        <h3>Welcome Back, Fulan</h3>
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
                        {{--  Dropdown menu, show/hide based on menu state.
                        Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                        Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                        --}}
                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                    tabindex="-1" id="menu-item-0">Account settings</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                    tabindex="-1" id="menu-item-1">Support</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                    tabindex="-1" id="menu-item-2">License</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm"
                                        role="menuitem" tabindex="-1" id="menu-item-3">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Dropdown --}}
                </div>
            @endauth
        </div>
    </nav>
</header>
<script>
    const dropdownProfile = document.querySelector('[role="menu"]')
    const menuButton = document.querySelector('#menu-button')

    // Klik di Luar Hamburger
    window.addEventListener("click", function(e) {
        console.log(e.target)
        if (e.target != menuButton && e.target != dropdownProfile) {
            dropdownProfile.classList.add("hidden");
        }
    });

    menuButton.addEventListener("click", function() {
        dropdownProfile.classList.toggle('hidden');
    })
</script>
