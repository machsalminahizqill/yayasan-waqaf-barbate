<header id="header"
    class="header sticky top-0 w-full h-20 md:h-20 bg-white transition-all duration-500 ease-in-out z-30 border-b-2">
    <div id="background" class="flex justify-between items-center h-full leftright z-20">
        <a href="/admin/dashboard" class="standard-logo">
            <img class="w-14" src="/assets/logo.png" alt="Waqaf Barbate">
        </a>
        <div>
            <div id="iconHamburger" class="cursor-pointer md:hidden container" onClick="handleIconHamburger()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <div id="menu" class="hidden md:flex justify-end gap-1 z-50">
                <a href="{{ route('dashboardAdmin') }}"
                    class="{{ (request()->is('admin/dashboard')) ? 'border-b-[3px] border-emerald-500' : '' }}  px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800    transition-all duration-300 ease-in-out">
                    Dashboard
                </a>

                <a href="{{ route('beritaAdmin') }}"
                    class="{{ (request()->is('admin/berita')) ? 'border-b-[3px] border-emerald-500' : '' }}
                    {{ (request()->is('admin/berita/tambah')) ? 'border-b-[3px] border-emerald-500' : '' }}
                    px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800    transition-all duration-300 ease-in-out">
                    Berita
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800    transition-all duration-300 ease-in-out" type="submit">logout</button>

                </form>

                {{-- <a href="{{ route('berandaPage') }}"
                    class="{{ (request()->is('kontak')) ? 'border-emerald-500' : 'border-transparent' }} px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800    transition-all duration-300 ease-in-out">
                    Kontak
                </a> --}}
           </div>
        </div>
    </div>

    <!-- mobile -->
    <div id="dropdown"
        class="absolute top-16 right-0 md:hidden bg-[#fff] transition-all duration-500 ease-in h-0 overflow-hidden w-[40vw] shadow-xl rounded-bl-xl">

        <a href="{{ route('dashboardAdmin') }}" class="w-full flex justify-start py-2">
            <div class=" cursor-pointer group md:hover:bg-black/40 px-4 rounded-md">
                <p class=" hover:font-semibold">Dashboard</p>
                <div class="h-1 background-gradient-emas group-hover:bg-yellow-500 rounded-full">
                </div>
            </div>
        </a>
        <a href="{{ route('beritaAdmin') }}" class="w-full flex justify-start group py-2 mb-2">
            <div class=" cursor-pointer group md:hover:bg-black/40 px-4 rounded-md">
                <p class=" hover:font-semibold">Berita</p>
                <div class="h-1 background-gradient-emas group-hover:bg-yellow-500 rounded-full">
                </div>
            </div>
        </a>
        <div class="w-full flex justify-start group py-2 mb-2">
            <form method="POST" class="px-4" action="{{ route('logout') }}">
                @csrf

                <button class="" type="submit">logout</button>

            </form>

        </div>
    </div>

</header>
