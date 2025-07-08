<nav class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-screen-xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ route('sikeset') }}" class="font-montserrat font-bold text-lg">SIKESET</a>

        <ul class="hidden md:flex items-center gap-8 text-sm font-medium">
            <li><a href="{{ route('sikeset') }}" class="text-gray-700 hover:text-black">Home</a></li>
            <a href="{{ route('sikeset') }}#about" class="text-gray-700 hover:text-black">About Us</a>
            <li><a href="{{ route('aset-list') }}" class="text-gray-700 hover:text-black">Daftar Aset</a></li>
        </ul>

        <div class="flex items-center gap-4">
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                        <img src="{{ asset('assets/user.jpg') }}" alt="Foto Profil"
                            class="w-8 h-8 rounded-full object-cover border-2 border-gray-300 transition ring-2 ring-transparent hover:ring-indigo-400" />
                        <span class="font-semibold text-sm">{{ Auth::user()->nama }}</span>
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" x-transition @click.away="open = false"
                        class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg py-2 z-50 border border-gray-200 origin-top-right">
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition rounded-t-xl">
                            Profile
                        </a>
                        <a href="{{ route('riwayat-peminjaman') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition">
                            Riwayat Peminjaman
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition rounded-b-xl">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login-mahasiswa') }}"
                    class="bg-black text-white rounded-full px-6 py-2 text-sm font-medium hover:bg-gray-900 transition">
                    Login
                </a>
            @endauth
        </div>
    </div>
</nav>