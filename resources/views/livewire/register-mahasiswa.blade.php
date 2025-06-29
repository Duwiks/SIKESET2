<div class="min-h-screen flex items-center justify-center font-sans text-gray-900"
    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="form-container bg-white rounded-xl shadow-lg p-8 max-w-md w-full">
        <h2 class="text-3xl font-bold mb-8 text-center">Register Mahasiswa</h2>

        <form wire:submit.prevent="store" class="space-y-6">
            <div>
                <label for="register-name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="register-name" wire:model.defer="nama" required
                    placeholder="Masukkan nama lengkap"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-green-500" />
                @error('nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="register-jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                <input type="text" id="register-jurusan" wire:model.defer="jurusan" required
                    placeholder="Masukkan jurusan"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-green-500" />
                @error('jurusan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="register-telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="text" id="register-telepon" wire:model.defer="telepon" required
                    placeholder="Masukkan No Telp"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-green-500" />
                @error('telepon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="register-email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="register-email" wire:model.defer="email" required placeholder="you@example.com"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-green-500" />
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white font-semibold py-2 rounded-md hover:bg-green-700 transition">
                Register
            </button>

            <p class="text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login-mahasiswa') }}" class="text-indigo-600 hover:underline font-semibold">
                    Login
                </a>
            </p>
        </form>

        <!-- Modal Berhasil -->
        @if($showSuccessModal)
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-xl text-center max-w-sm w-full">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="white" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold mb-2">Registrasi Berhasil!</h2>
                    <p class="mb-4 text-gray-600">Akun kamu berhasil dibuat. Silakan login untuk melanjutkan.</p>
                    <button type="button" wire:click="closeSuccessModal"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none">
                        Tutup
                    </button>
                </div>
            </div>
        @endif

    </div>
</div>