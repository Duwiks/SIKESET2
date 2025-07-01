<div class="bg-[#f5f8fb] min-h-screen flex items-center justify-center relative overflow-hidden"
    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">

    <div class="form-container bg-white rounded-xl shadow-lg p-8">
        <h2 id="form-title" class="text-3xl font-bold mb-8 text-center">Login</h2>
        @if (session()->has('error'))
            <div class="mb-4 text-red-600 text-center font-semibold">
                {{ session('error') }}
            </div>
        @endif
        <form wire:submit.prevent="proses" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="email" id="email" wire:model.defer="email" required placeholder="you@example.com"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                <input type="text" id="nama" wire:model.defer="nama" required placeholder="masukkan nama"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-md hover:bg-indigo-700 transition">
                Log In
            </button>

            <p class="text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register-mahasiswa') }}"
                    class="text-indigo-600 hover:underline font-semibold">Register here</a>
            </p>
        </form>

        @if ($showSuccessModal)
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-12 w-12 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <h3 class="text-lg font-semibold">Login Berhasil!</h3>
                    <p class="text-gray-600 mb-4">Selamat datang, kamu berhasil login.</p>
                    <button wire:click="closeSuccessModal"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Tutup
                    </button>
                </div>
            </div>
        @endif


    </div>
</div>