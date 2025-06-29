<div class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="w-64 bg-indigo-800 text-white shadow-lg flex flex-col">
        <div class="p-4 flex flex-col items-center border-b border-indigo-700">
            <img src="{{ asset('assets/user.jpg') }}" alt="Foto Profil"
                class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 transition ring-2 ring-transparent hover:ring-indigo-400" />
            <span class="font-semibold">{{ Auth::user()->nama }}</span>
            <p class="text-indigo-200 text-sm">Mahasiswa</p>
        </div>
        <nav class="p-4">
            <ul>
                <li class="mb-2">
                    <button onclick="showSection('profile')"
                        class="profile-nav w-full flex items-center p-3 rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </button>
                </li>
                <li class="mb-2">
                    <button onclick="showSection('loan')"
                        class="loan-nav w-full flex items-center p-3 rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Peminjaman
                    </button>
                </li>
            </ul>
        </nav>

        <div class="mt-auto p-4">
            <button onclick="showSection('logout')"
                class="logout-nav w-full flex items-center p-3 rounded-lg hover:bg-indigo-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Profile Section -->
        <div id="profileContent" class="active-section">
            <h1 class="text-3xl font-bold text-indigo-800 mb-6">Profil Pengguna</h1>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pribadi</h2>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                                <p class="text-lg">John Doe</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-lg">john.doe@example.com</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nomor Telepon</p>
                                <p class="text-lg">+62 812 3456 7890</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Alamat</p>
                                <p class="text-lg">Jl. Contoh No. 123, Jakarta</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Tambahan</h2>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Posisi</p>
                                <p class="text-lg">Administrator</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Departemen</p>
                                <p class="text-lg">IT</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Bergabung Sejak</p>
                                <p class="text-lg">15 Januari 2020</p>
                            </div>
                        </div>
                        <button
                            class="mt-6 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Edit Profil
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loan Section -->
        <div id="loanContent" class="hidden">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-indigo-800">Daftar Peminjaman</h1>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    + Tambah Peminjaman
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Loan Card 1 -->
                <div class="loan-card bg-white rounded-lg shadow overflow-hidden transition-all duration-300">
                    <div class="bg-indigo-100 p-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-indigo-800">ID: P20230001</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                        </div>
                        <h3 class="text-xl font-bold mt-2">Laptop Dell XPS 15</h3>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Tanggal Pinjam</span>
                            <span class="font-medium">15 Juli 2023</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Tanggal Kembali</span>
                            <span class="font-medium">30 Juli 2023</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Status</span>
                            <span class="font-medium text-green-600">Dipinjam</span>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 flex justify-end space-x-2">
                        <button class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded hover:bg-blue-200">
                            Detail
                        </button>
                        <button class="px-3 py-1 text-sm bg-red-100 text-red-800 rounded hover:bg-red-200">
                            Batalkan
                        </button>
                    </div>
                </div>

                <!-- Loan Card 2 -->
                <div class="loan-card bg-white rounded-lg shadow overflow-hidden transition-all duration-300">
                    <div class="bg-indigo-100 p-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-indigo-800">ID: P20230002</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        </div>
                        <h3 class="text-xl font-bold mt-2">Projector Epson</h3>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Tanggal Pinjam</span>
                            <span class="font-medium">1 Agustus 2023</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Tanggal Kembali</span>
                            <span class="font-medium">5 Agustus 2023</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Status</span>
                            <span class="font-medium text-yellow-600">Menunggu</span>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 flex justify-end space-x-2">
                        <button class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded hover:bg-blue-200">
                            Detail
                        </button>
                        <button class="px-3 py-1 text-sm bg-red-100 text-red-800 rounded hover:bg-red-200">
                            Batalkan
                        </button>
                    </div>
                </div>

                <!-- Loan Card 3 -->
                <div class="loan-card bg-white rounded-lg shadow overflow-hidden transition-all duration-300">
                    <div class="bg-indigo-100 p-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-indigo-800">ID: P20230003</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Completed</span>
                        </div>
                        <h3 class="text-xl font-bold mt-2">Buku Panduan React</h3>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Tanggal Pinjam</span>
                            <span class="font-medium">10 Juni 2023</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Tanggal Kembali</span>
                            <span class="font-medium">25 Juni 2023</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Status</span>
                            <span class="font-medium text-gray-600">Selesai</span>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 flex justify-end space-x-2">
                        <button class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded hover:bg-blue-200">
                            Detail
                        </button>
                        <button class="px-3 py-1 text-sm bg-green-100 text-green-800 rounded hover:bg-green-200">
                            Pinjam Lagi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Section -->
        <div id="logoutContent" class="hidden">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden mt-10">
                <div class="p-8">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <h2 class="mt-4 text-2xl font-bold text-gray-800">Keluar dari Aplikasi</h2>
                        <p class="mt-2 text-gray-600">Apakah Anda yakin ingin keluar dari akun ini?</p>
                    </div>
                    <div class="mt-8 flex justify-center space-x-4">
                        <button onclick="showSection('profile')"
                            class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                            Batal
                        </button>
                        <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            Keluar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>