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
                        <strong class="text-sm font-semibold">Mahasiswa</strong>
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
                    <p> SIKESET (Sistem Kelola Aset) adalah sistem web untuk mengelola aset sekolah atau instansi,
                        seperti gedung, ruang, dan alat praktik. Fitur unggulannya memungkinkan pengguna meminjam
                        aset
                        secara online dengan mudah.</p>
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
                <input type="text" class="w-full border px-3 py-2 rounded" value="{{ Auth::user()->nama }}" disabled>
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
                <textarea class="w-full border px-3 py-2 rounded" wire:model.defer="keterangan"
                    rows="3" placeholder="Keperluan..."></textarea>
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

</div>