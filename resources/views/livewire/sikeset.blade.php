<div>
    @include("components.layouts.navbar")
    <section id="home" style="background-color: #f5f5f5;">
        <div class="px-1 py-8 max-w-screen-xl mx-auto">
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
                        <div class="text-xs text-gray-500">Aset</div>
                        @if($gedungs->count() > 0)
                            <strong class="text-sm font-semibold">{{ $gedungs->count() }} Aset</strong>
                        @else
                            <strong class="text-sm font-semibold text-gray-400 italic">Data kosong</strong>
                        @endif
                    </div>

                </div>

                <!-- Divider -->
                <div class="hidden md:block border-l border-gray-300 h-10"></div>

                <!-- Price Range -->
                <div class="flex items-center gap-3 flex-grow">
                    <i class="fas fa-eye text-sm text-gray-500"></i>
                    <div>
                        <div class="text-xs text-gray-500">Data User</div>
                        <strong class="text-sm font-semibold">{{ $users }}</strong>
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

    <section id="about" class="py-12 px-4 max-w-screen-xl mx-auto">
        <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-12">

            <!-- Konten Teks -->
            <div class="md:w-1/2 space-y-6">
                <p class="text-sm text-blue-500 font-semibold border-l-4 border-blue-400 pl-3">About Us</p>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-snug">
                    SIKESET - Sistem Informasi Kelola Aset Sekolah<br>
                    Memudahkan pengelolaan dan peminjaman aset secara efisien
                </h2>

                <!-- Nilai/Keunggulan -->
                <div class="space-y-5 mt-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                            <i class="fa-solid fa-laptop-code text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg">Digitalisasi</h4>
                            <p class="text-gray-600 text-sm">Mengelola aset secara digital untuk efisiensi dan
                                transparansi.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-pink-100 text-pink-600 p-3 rounded-full">
                            <i class="fa-solid fa-handshake text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg">Kolaboratif</h4>
                            <p class="text-gray-600 text-sm">Mendorong keterlibatan semua pihak dalam penggunaan aset.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                            <i class="fa-solid fa-bolt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg">Cepat & Mudah</h4>
                            <p class="text-gray-600 text-sm">Proses peminjaman yang cepat, online, dan user-friendly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            <div class="md:w-1/2">
                <img src="{{ asset('assets/logo.png') }}" alt="Tentang SIKESET"
                    class="rounded-lg shadow-lg w-full object-cover max-h-[400px]">
            </div>
        </div>
    </section>



    <!-- Section Daftar Gedung -->
    <section class="px-4 py-12 max-w-screen-xl mx-auto">
        <h2 class="text-3xl font-bold text-center font-montserrat mb-10">Daftar Gedung</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($gedungs->take(3) as $gedung)
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col h-full">
                    <img src="{{ $gedung->gambar ? asset('storage/' . $gedung->gambar) : asset('assets/default.jpg') }}"
                        alt="{{ $gedung->nama }}" class="w-full h-48 object-cover">

                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-xl font-semibold mb-1">{{ $gedung->nama }}</h3>
                        <p class="text-sm text-gray-600 mb-1">Kategori: {{ $gedung->kategori->nama ?? '-' }}</p>

                        @if($gedung->kategori)
                            <p class="text-sm text-gray-500 italic mb-2">
                                {{ $gedung->kategori->deskripsi }}
                            </p>
                        @endif

                        <div class="mt-auto">
                            <button wire:click="bukaModal({{ $gedung->id }})"
                                class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-900 transition w-full">
                                Pinjam
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-white rounded-xl w-full max-w-md p-6 relative">
                <h2 class="text-xl font-bold mb-4">Form Peminjaman Gedung</h2>

                <form>
                    <div class="mb-4">
                        <label class="block text-sm mb-1">Nama Peminjam</label>
                        <input type="text" class="w-full border px-3 py-2 rounded" value="{{ Auth::user()->nama }}"
                            disabled>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-1">Tanggal Pinjam</label>
                        <input type="date" class="w-full border px-3 py-2 rounded" wire:model.defer="tanggal_pinjam">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-1">Tanggal Selesai</label>
                        <input type="date" class="w-full border px-3 py-2 rounded" wire:model.defer="tanggal_kembali">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-1">Keterangan</label>
                        <textarea class="w-full border px-3 py-2 rounded" wire:model.defer="keterangan" rows="3"
                            placeholder="Keperluan..."></textarea>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="tutupModal"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button type="button" wire:click="pinjam"
                            class="px-4 py-2 bg-black text-white rounded hover:bg-gray-900">Kirim</button>
                    </div>
                </form>

                <button wire:click="tutupModal"
                    class="absolute top-3 right-4 text-gray-500 text-xl hover:text-black">&times;</button>
            </div>
        </div>
    @endif

    @if ($showSuccessModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-md text-center max-w-md w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-12 w-12 text-green-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <h3 class="text-lg font-semibold">Peminjaman Berhasil!</h3>
                <p class="text-gray-600 mb-4">Data peminjaman berhasil dikirim.</p>
                <button wire:click="closeSuccessModal"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Tutup
                </button>
            </div>
        </div>
    @endif

</div>