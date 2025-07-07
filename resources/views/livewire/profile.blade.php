<div class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="w-64 bg-indigo-800 text-white shadow-lg flex flex-col">
        <div class="p-4 flex flex-col items-center border-b border-indigo-700">
            <img src="{{ asset('assets/user.jpg') }}" alt="Foto Profil"
                class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 transition ring-2 ring-transparent hover:ring-indigo-400" />
            <span class="font-semibold">{{ $name }}</span>
            <p class="text-indigo-200 text-sm">{{ $email }}</p>
        </div>
        <nav class="p-4">
            <ul>
                <li class="mb-2">
                    <a href="{{ route('profile') }}"
                        class="profile-nav w-full flex items-center p-3 rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('riwayat-peminjaman') }}"
                        class="loan-nav w-full flex items-center p-3 rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Peminjaman
                    </a>
                </li>
            </ul>
        </nav>

        <div class="mt-auto p-4">
            <a href="{{ route('sikeset') }}"
                class="loan-nav w-full flex items-center p-3 rounded-lg hover:bg-indigo-700 transition-colors mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7m-9 2v6m4-6v6m-6 0h6a2 2 0 002-2V10.586a1 1 0 00-.293-.707l-7-7a1 1 0 00-1.414 0l-7 7a1 1 0 00-.293.707V18a2 2 0 002 2h6" />
                </svg>

                Kembali Ke Beranda
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="logout-nav w-full flex items-center p-3 rounded-lg hover:bg-red-800 transition-colors bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-indigo-800 mb-6">Profil Pengguna</h1>

        @if (session()->has('message'))
            <div class="mb-4 text-green-600 bg-green-100 border border-green-200 p-3 rounded">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6">
            @if (!$editMode)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pribadi</h2>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                                <p class="text-lg">{{ $name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Jurusan</p>
                                <p class="text-lg">{{ $jurusan }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-lg">{{ $email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Telepon</p>
                                <p class="text-lg">{{ $telepon }}</p>
                            </div>
                        </div>
                        <button wire:click="enableEdit"
                            class="mt-6 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Edit Profil
                        </button>
                    </div>
                </div>
            @else
                <form wire:submit.prevent="updateProfile" class="space-y-4">
                    <div>
                        <label class="block font-semibold text-sm text-gray-700">Nama</label>
                        <input type="text" wire:model.defer="name"
                            class="w-full border px-3 py-2 rounded @error('name') border-red-500 @enderror">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block font-semibold text-sm text-gray-700">Jurusan</label>
                        <input type="text" wire:model.defer="jurusan"
                            class="w-full border px-3 py-2 rounded @error('jurusan') border-red-500 @enderror">
                        @error('jurusan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        <div>
                            <label class="block font-semibold text-sm text-gray-700">Email</label>
                            <input type="email" wire:model.defer="email"
                                class="w-full border px-3 py-2 rounded @error('email') border-red-500 @enderror">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block font-semibold text-sm text-gray-700">Telepon</label>
                            <input type="text" wire:model.defer="telepon"
                                class="w-full border px-3 py-2 rounded @error('telepon') border-red-500 @enderror">
                            @error('telepon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            <div class="flex gap-2">
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                    Simpan
                                </button>
                                <button type="button" wire:click="$set('editMode', false)"
                                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                                    Batal
                                </button>
                            </div>
                </form>
            @endif
        </div>
    </div>
</div>