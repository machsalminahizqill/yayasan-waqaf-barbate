<header id="header"
    class="header sticky top-0 w-full h-20 md:h-20 bg-white transition-all duration-500 ease-in-out z-30 border-b-2">
    <div id="background" class="flex justify-between items-center h-full leftright z-20">
        <a href="/" class="standard-logo">
            <img class="w-14" src="/assets/logo.png" alt="Waqaf Barbate">
        </a>
        <div>
            <div id="iconHamburger" class="cursor-pointer md:hidden container" onClick="handleIconHamburger()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <div id="menu" class="hidden md:flex justify-end gap-1 z-50">
                <a href="{{ route('berandaPage') }}"
                    class="{{ (request()->is('/')) ? 'border-emerald-500' : 'border-transparent' }}  px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800 border-b-[3px]  hover:border-emerald-500 transition-all duration-300 ease-in-out">
                    Beranda
                </a>

                <div  class="{{ (request()->is('profil/visi-dan-misi')) ? 'border-emerald-500' : 'border-transparent' }}
                     relative px-4 py-2 tracking-wide font-semibold  text-sm text-gray-500 hover:text-gray-800 group border-b-[3px]  hover:border-emerald-500 transition-all duration-300 ease-in-out">
                    <div class="flex justify-beetwen items-center gap-2 cursor-pointer w-full">
                        <span>Profil</span>
                        <div class="group-hover:rotate-180 transition-all duration-300 ease-in-out">
                            <svg fill="currentColor" class="w-3 " viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                    </div>
                    <div class="hidden md:hidden md:group-hover:block pt-4 absolute w-40 buttom-0 left-0">
                        <div class="bg-white md:absolute w-full buttom-0 left-0 shadow-lg group-focus:block  overflow-hidden">
                            <a href="{{ route('visiMisiPage') }}" class="">
                                <p class="w-full px-4 py-1.5 text-sm hover:text-emerald-500 hover:translate-x-2 transition-all duration-200 ease-in-out">
                                    Visi dan Misi</p>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('beritaPage') }}"
                    class="{{ (request()->is('berita')) ? 'border-emerald-500' : 'border-transparent' }} px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800 border-b-[3px]  hover:border-emerald-500 transition-all duration-300 ease-in-out">
                    Berita
                </a>

                <a href="{{ route('kontakPage') }}"
                    class="{{ (request()->is('kontak')) ? 'border-emerald-500' : 'border-transparent' }} px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800 border-b-[3px]  hover:border-emerald-500 transition-all duration-300 ease-in-out">
                    Kontak
                </a>
                <a href="{{ route('donasiPage') }}"
                    class="{{ (request()->is('donasi')) ? 'border-emerald-500' : 'border-transparent' }} px-4 py-2 tracking-wide font-semibold text-sm text-gray-500 hover:text-gray-800 border-b-[3px]  hover:border-emerald-500 transition-all duration-300 ease-in-out">
                    Donasi
                </a>
           </div>
        </div>
    </div>

    <!-- mobile -->
    <div id="dropdown"
        class="absolute top-16 right-0 md:hidden bg-[#fff] transition-all duration-500 ease-in h-0 overflow-hidden w-[40vw] shadow-xl rounded-bl-xl">
        <a href="{{ route('berandaPage') }}" class="w-full flex justify-start py-2">
            <div class=" cursor-pointer group md:hover:bg-black/40 px-4 rounded-md">
                <p class=" hover:font-semibold">Beranda</p>
                <div class="{{ (request()->is('/')) ? 'bg-emerald-500' : 'border-transparent' }} h-1 background-gradient-emas group-hover:bg-emerald-800 rounded-full">
                </div>
            </div>
        </a>
        <div class="w-full flex justify-start items-center py-2 group" onclick="toggleDropdown()">
            <div class=" cursor-pointer group md:hover:bg-black/40 px-4 rounded-md">
                <p class="hover:font-semibold">Profil</p>
                <div id="span-profile" class="hidden h-1 background-gradient-emas group-hover:bg-emerald-500 rounded-full"></div>
            </div>
            <div id="icon-arrow-profile" class=" transition-all duration-300 ease-in-out">
                <svg fill="currentColor" class="w-3 " viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </div>
        </div>
        <span id="sub-dropdown" class="group hidden transition-all duration-300 ease-in-out">
            <a href="{{ route('visiMisiPage') }}" class="">
                <p
                    class="w-full px-6 py-1.5 text-base hover:text-emerald-500 hover:translate-x-2 transition-all duration-200 ease-in-out">
                    Visi dan Misi</p>
            </a>
        </span>
        <a href="{{ route('beritaPage') }}" class="w-full flex justify-start py-2">
            <div class=" cursor-pointer group md:hover:bg-black/40 px-4 rounded-md">
                <p class=" hover:font-semibold">Berita</p>
                <div class="{{ (request()->is('berita')) ? 'bg-emerald-500' : 'border-transparent' }} h-1 background-gradient-emas group-hover:bg-emerald-800 rounded-full">
                </div>
            </div>
        </a>
        <a href="{{ route('kontakPage') }}" class="w-full flex justify-start group py-2">
            <div class=" cursor-pointer group md:hover:bg-black/40 px-4 rounded-md">
                <p class=" hover:font-semibold">Kontak</p>
                <div class="{{ (request()->is('kontak')) ? 'bg-emerald-500' : 'border-transparent' }} h-1 background-gradient-emas group-hover:bg-emerald-500 rounded-full">
                </div>
            </div>
        </a>
        <a href="{{ route('donasiPage') }}" class="w-full flex justify-start group py-2 mb-2">
            <div class=" cursor-pointer group md:hover:bg-black/40 px-4 rounded-md">
                <p class=" hover:font-semibold">Donasi</p>
                <div class="{{ (request()->is('donasi')) ? 'bg-emerald-500' : 'border-transparent' }} h-1 background-gradient-emas group-hover:bg-emerald-500 rounded-full">
                </div>
            </div>
        </a>
    </div>

</header>
