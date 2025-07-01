<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3 bg-white border-end shadow-lg sidebar" style="min-height: 100vh;">
    <div class="d-flex justify-content-center align-items-center mb-1">
        <img src="{{ asset('assets/SIKESET.png') }}" alt="Logo" width="100">
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link d-flex align-items-center rounded-pill px-3 py-2 mb-2 {{ request()->routeIs('home') ? 'bg-primary text-white' : 'text-dark' }}">
                <i data-feather="home" class="me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('member') }}"
                class="nav-link d-flex align-items-center rounded-pill px-3 py-2 mb-2 {{ request()->routeIs('member') ? 'bg-primary text-white' : 'text-dark' }}">
                <i data-feather="users" class="me-"></i> Kelola Mahasiswa
            </a>
        </li>
        <li>
            <a href="{{ route('gedung') }}"
                class="nav-link d-flex align-items-center rounded-pill px-3 py-2 mb-2 {{ request()->routeIs('gedung') ? 'bg-primary text-white' : 'text-dark' }}">
                <i data-feather="book" class="me-2"></i> Kelola Aset
            </a>
        </li>
        <li>
            <a href="{{ route('pinjam') }}"
                class="nav-link d-flex align-items-center rounded-pill px-3 py-2 mb-2 {{ request()->routeIs('pinjam') ? 'bg-primary text-white' : 'text-dark' }}">
                <i data-feather="file" class="me-2"></i> Kelola Peminjaman
            </a>
        </li>
        <li>
            <a href="{{ route('kembali') }}"
                class="nav-link d-flex align-items-center rounded-pill px-3 py-2 mb-2 {{ request()->routeIs('kembali') ? 'bg-primary text-white' : 'text-dark' }}">
                <i data-feather="check-circle" class="me-2"></i> Kelola Pengembalian
            </a>
        </li>
        <li>
            <a href="{{ route('kategori') }}"
                class="nav-link d-flex align-items-center rounded-pill px-3 py-2 mb-2 {{ request()->routeIs('kategori') ? 'bg-primary text-white' : 'text-dark' }}">
                <i data-feather="tag" class="me-2"></i> Kelola Kategori
            </a>
        </li>
        <li>
            <a href="{{ route('user') }}"
                class="nav-link d-flex align-items-center rounded-pill px-3 py-2 mb-2 {{ request()->routeIs('user') ? 'bg-primary text-white' : 'text-dark' }}">
                <i data-feather="user" class="me-2"></i> Kelola Staff
            </a>
        </li>
    </ul>

    <div class="mt-auto">
        <hr>
        <a href="{{ route('logout') }}" wire:click="keluar"
            class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center rounded-pill">
            <i data-feather="log-out" class="me-2"></i> Logout
        </a>
    </div>
</div>