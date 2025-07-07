<div>
    @include("components.layouts.navbar")


<div class="px-4 py-12 max-w-screen-xl mx-auto">
    <h2 class="text-3xl font-bold text-center font-montserrat mb-10">Daftar Aset</h2>

    <!-- Filter kategori -->
    <div class="flex justify-center mb-8">
        <select wire:model="kategori_id" wire:change="filterKategori" class="border border-gray-300 rounded px-4 py-2">
            <option value="">Semua Kategori</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>

    <!-- Daftar Aset -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($gedungs as $gedung)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="{{ $gedung->gambar ? asset('storage/' . $gedung->gambar) : asset('assets/default.jpg') }}"
                    alt="{{ $gedung->nama }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-1">{{ $gedung->nama }}</h3>
                    <p class="text-sm text-gray-600 mb-1">Kategori: {{ $gedung->kategori->nama ?? '-' }}</p>
                    <p class="text-sm text-gray-500 mb-4">
                        {{ $gedung->deskripsi ?? 'Gedung tersedia untuk kegiatan kampus.' }}
                    </p>
                    <button wire:click="bukaModal({{ $gedung->id }})"
                        class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-900 transition w-full">
                        Pinjam
                    </button>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-3">Tidak ada aset ditemukan.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $gedungs->links() }}
    </div>

    <!-- Modal Form Peminjaman -->
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
                    @error('tanggal_pinjam') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Tanggal Selesai</label>
                    <input type="date" class="w-full border px-3 py-2 rounded" wire:model.defer="tanggal_kembali">
                    @error('tanggal_kembali') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Keterangan</label>
                    <textarea class="w-full border px-3 py-2 rounded" wire:model.defer="keterangan"
                        rows="3" placeholder="Keperluan..."></textarea>
                    @error('keterangan') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
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
</div>
