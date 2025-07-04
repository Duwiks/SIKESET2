<div>
    <section id="home" style="background-color: #f5f5f5;">
        <div class="px-1 py-8 max-w-screen-xl mx-auto">
            <nav class="flex items-center justify-between">
                <a href="#" class="font-montserrat font-bold text-[18px]">SIKESET</a>
                <ul class="flex items-center gap-8 text-[14px] font-normal">
                    <li><a href="#home" class="hover:text-black">Home</a></li>
                    <li><a href="#" class="hover:text-black">About Us</a></li>
                    <li><a href="#" class="hover:text-black">Properties</a></li>
                    <li><a href="#" class="hover:text-black">Blogs</a></li>
                    <li>
                        @auth
                            <div x-data="{ open: false }" class="relative flex items-center gap-3">
                                <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                                    <img src="{{ asset('assets/user.jpg') }}" alt="Foto Profil"
                                        class="w-8 h-8 rounded-full object-cover border-2 border-gray-300 transition ring-2 ring-transparent hover:ring-indigo-400" />
                                    <span class="font-semibold">{{ Auth::user()->nama }}</span>
                                    <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <!-- Dropdown -->
                                <div x-show="open" x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95" @click.away="open = false"
                                    class="absolute right-0 mt-36 w-44 bg-white rounded-xl shadow-lg py-2 z-50 border border-gray-200 origin-top-right"
                                    style="min-width: 160px;">
                                    <a href="{{ route('profile') }}"
                                        class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition rounded-t-xl">Profile</a>
                                    <a href="{{ route('profile') }}"
                                        class="block px-4 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition">Peminjam</a>
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
                                class="bg-black text-white rounded-[30px] px-6 py-2 text-[14px] font-medium hover:bg-gray-900 transition">
                                Login
                            </a>
                        @endauth
                    </li>
                </ul>
            </nav>

            <div class="flex flex-col lg:flex-row items-center lg:items-stretch mt-16 gap-10">
                <!-- KIRI: TEKS -->
                <div class="lg:w-1/2 flex justify-center items-center">
                    <div>
                        <h1 class="font-normal leading-tight mb-3">
                            Welcome to 👋<br />
                            <strong class="font-montserrat font-bold block text-[70px]">SIKESET</strong>
                        </h1>
                        <p class=" text-gray-600 mb-8">
                            SIKESET (Sistem Kelola Aset) adalah sistem web untuk mengelola aset sekolah atau instansi,
                            seperti gedung, ruang, dan alat praktik. Fitur unggulannya memungkinkan pengguna meminjam
                            aset
                            secara online dengan mudah.
                        </p>
                        <div class="flex items-center gap-6 flex-wrap">
                            <button
                                class="bg-black text-white rounded-[30px] px-8 py-2 text-[14px] font-normal hover:bg-gray-900 transition">
                                Kunjungi Sekarang
                            </button>
                        </div>
                    </div>
                </div>

                <!-- KANAN: GAMBAR -->
                <div class="lg:w-1/2 flex justify-center">
                    <img src="https://storage.googleapis.com/a1aa/image/cf50ac46-6e88-4856-91e6-21806d085d03.jpg"
                        alt="Modern house with black roof, white walls, orange chimney, and multiple windows"
                        class="max-w-[500px] w-full h-auto rounded-xl object-cover" />
                </div>
            </div>


            <!-- Property Search Form -->
            <form aria-label="Property search form" role="search"
                class="flex flex-wrap items-center bg-white rounded-[20px] shadow-[0_10px_30px_rgba(0,0,0,0.1)] py-8 px-4 -mt-12 gap-4 relative z-10">

                <!-- Location -->
                <div class="flex items-center gap-3 flex-grow">
                    <i class="fas fa-map-marker-alt text-sm text-gray-500"></i>
                    <div>
                        <div class="text-xs text-gray-500">Location</div> <!-- ~12px -->
                        <strong class="text-sm font-semibold max-w-xs block"> Kampus Bukit, Jimbaran, South Kuta, Badung
                            Regency, Bali
                            80364</strong> <!-- ~14px -->
                    </div>
                </div>

                <!-- Divider -->
                <div class="hidden md:block border-l border-gray-300 h-10"></div>

                <!-- Property Type -->
                <div class="flex items-center gap-3 flex-grow">
                    <i class="fas fa-home text-sm text-gray-500"></i>
                    <div>
                        <div class="text-xs text-gray-500">Gedung</div>
                        <strong class="text-sm font-semibold">12 Gedung</strong>
                    </div>
                </div>

                <!-- Divider -->
                <div class="hidden md:block border-l border-gray-300 h-10"></div>

                <!-- Price Range -->
                <div class="flex items-center gap-3 flex-grow">
                    <i class="fas fa-eye text-sm text-gray-500"></i>
                    <div>
                        <div class="text-xs text-gray-500">Mahasiswa</div>
                        <strong class="text-sm font-semibold">6,000 - 12,000 Mahasiswa</strong>
                    </div>
                </div>


                <!-- Search Button -->
                <button aria-label="Search properties" type="submit"
                    class="bg-black text-white rounded-full w-11 h-11 flex justify-center items-center hover:bg-gray-900 transition">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </section>

    <section id="about" class="px-1 py-8 max-w-screen-xl mx-auto mt-7">
        <h1 class=" text-center font-montserrat font-bold block text-[30px]">About</h1>
        <div class="flex items-center justify-between mb-8">
            <img src="{{ asset("assets/logo.png") }}" alt="">
            <div class="content-about">
                <div class="title">
                    <h2>Test</h2>
                </div>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cumque. Quisquam, voluptatum
                        doloremque. Quasi, cumque. Doloribus, cumque. Quisquam, voluptatum doloremque. Quasi, cumque.
                        Doloribus, cumque. Quisquam, voluptatum doloremque.</p>
                </div>
                <div class="service">
                    <ul class="list-service">
                        <li><i class="fa-solid fa-check"></i> Service 1</li>
                        <li><i class="fa-solid fa-check"></i> Service 2</li>
                        <li><i class="fa-solid fa-check"></i> Service 3</li>
                    </ul>
                </div>
            </div>
    </section>

    <!-- Section Daftar Gedung -->
    <section class="px-4 py-12 max-w-screen-xl mx-auto">
        <h2 class="text-3xl font-bold text-center font-montserrat mb-10">Daftar Gedung</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kartu Gedung -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="{{ asset("assets/logo.png") }}" alt="Gedung A" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-1">Gedung A</h3>
                    <p class="text-sm text-gray-600 mb-1">Lokasi: Kampus Barat</p>
                    <p class="text-sm text-gray-500 mb-4">Gedung serbaguna yang digunakan untuk kegiatan besar kampus.
                    </p>
                    <button onclick="document.getElementById('modalPinjam').classList.remove('hidden')"
                        class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-900 transition w-full">
                        Pinjam
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="{{ asset("assets/logo.png") }}" alt="Gedung A" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-1">Gedung A</h3>
                    <p class="text-sm text-gray-600 mb-1">Lokasi: Kampus Barat</p>
                    <p class="text-sm text-gray-500 mb-4">Gedung serbaguna yang digunakan untuk kegiatan besar kampus.
                    </p>
                    <button onclick="document.getElementById('modalPinjam').classList.remove('hidden')"
                        class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-900 transition w-full">
                        Pinjam
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="{{ asset("assets/logo.png") }}" alt="Gedung A" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-1">Gedung A</h3>
                    <p class="text-sm text-gray-600 mb-1">Lokasi: Kampus Barat</p>
                    <p class="text-sm text-gray-500 mb-4">Gedung serbaguna yang digunakan untuk kegiatan besar kampus.
                    </p>
                    <button onclick="document.getElementById('modalPinjam').classList.remove('hidden')"
                        class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-900 transition w-full">
                        Pinjam
                    </button>
                </div>
            </div>
            <!-- Ulangi kartu di atas sesuai jumlah gedung -->
        </div>
    </section>

    <!-- Modal Form Peminjaman -->
    <div id="modalPinjam" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl w-full max-w-md p-6 relative">
            <h2 class="text-xl font-bold mb-4">Form Peminjaman Gedung</h2>

            <form>
                <div class="mb-4">
                    <label class="block text-sm mb-1">Nama Peminjam</label>
                    <input type="text" class="w-full border px-3 py-2 rounded" placeholder="Nama Anda">
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Tanggal Pinjam</label>
                    <input type="date" class="w-full border px-3 py-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Jam Mulai</label>
                    <input type="time" class="w-full border px-3 py-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Tanggal Selesai</label>
                    <input type="date" class="w-full border px-3 py-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Jam Selesai</label>
                    <input type="time" class="w-full border px-3 py-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Keterangan</label>
                    <textarea class="w-full border px-3 py-2 rounded" rows="3" placeholder="Keperluan..."></textarea>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="document.getElementById('modalPinjam').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-900">Kirim</button>
                </div>
            </form>

            <button onclick="document.getElementById('modalPinjam').classList.add('hidden')"
                class="absolute top-3 right-4 text-gray-500 text-xl hover:text-black">&times;</button>
        </div>
    </div>



</div>