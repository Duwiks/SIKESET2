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
    <div class="flex-1 p-8 space-y-10">

        <!-- Loan Section -->
        <div id="loanContent" class="">
            <h1 class="text-3xl font-bold text-indigo-800 mb-6">Daftar Peminjaman</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($peminjamans as $pinjam)
                    <div class="loan-card bg-white rounded-lg shadow overflow-hidden transition-all duration-300">
                        <div class="bg-indigo-100 p-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-indigo-800">ID:
                                    P{{ str_pad($pinjam->id, 6, '0', STR_PAD_LEFT) }}</span>
                                <span
                                    class="px-2 py-1 text-xs rounded-full 
                                                    {{ $pinjam->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($pinjam->status == 'selesai' ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800') }}">
                                    {{ ucfirst($pinjam->status) }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold mt-2">{{ $pinjam->gedung->nama ?? '-' }}</h3>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Tanggal Pinjam</span>
                                <span
                                    class="font-medium">{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Tanggal Kembali</span>
                                <span
                                    class="font-medium">{{ \Carbon\Carbon::parse($pinjam->tanggal_kembali)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">Status</span>
                                <span class="font-medium capitalize text-gray-800">{{ $pinjam->status }}</span>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 flex justify-end space-x-2">
                            <button class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded hover:bg-blue-200">
                                Detail
                            </button>
                            @if($pinjam->status == 'pending')
                                <form wire:submit.prevent="batalkan({{ $pinjam->id }})">
                                    <button type="submit"
                                        class="px-3 py-1 text-sm bg-red-100 text-red-800 rounded hover:bg-red-200">
                                        Batalkan
                                    </button>
                                </form>
                            @elseif($pinjam->status == 'selesai')
                                <button wire:click="pinjamLagi({{ $pinjam->gedung_id }})"
                                    class="px-3 py-1 text-sm bg-green-100 text-green-800 rounded hover:bg-green-200">
                                    Pinjam Lagi
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-full">Belum ada peminjaman.</p>
                @endforelse
            </div>
        </div>

        <!-- Optional Logout Section -->
        <div id="logoutContent" class="hidden">
            <p class="text-xl text-gray-600">Silakan logout melalui tombol atau halaman lainnya.</p>
        </div>
    </div>
</div>