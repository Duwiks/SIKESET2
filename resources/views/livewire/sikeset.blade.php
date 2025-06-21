<div>
    <section id="hom">
        <div class="px-1 py-8 max-w-screen-xl mx-auto">
            <nav class="flex items-center justify-between">
                <a href="#" class="font-montserrat font-bold text-[18px]">SIKESET</a>
                <ul class="flex items-center gap-8 text-[14px] font-normal">
                    <li><a href="#home" class="hover:text-black">Home</a></li>
                    <li><a href="#" class="hover:text-black">About Us</a></li>
                    <li><a href="#" class="hover:text-black">Properties</a></li>
                    <li><a href="#" class="hover:text-black">Blogs</a></li>
                    <li>
                        <a href="{{ route('login') }}"
                            class="bg-black text-white rounded-[30px] px-6 py-2 text-[14px] font-medium hover:bg-gray-900 transition">
                            Login
                        </a>
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
                        <strong class="text-sm font-semibold"> Kampus Bukit, Jimbaran, South Kuta, Badung Regency, Bali
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
</div>