<div>
    <nav class="col-md-2 bg-dark sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ route('home') }}">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('member')}}">
                        <span data-feather="users"></span>
                        Kelola Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('gedung') }}">
                        <span data-feather="book"></span>
                        Kelola Aset
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('pinjam') }}">
                        <span data-feather="file"></span>
                        Kelola Peminjaman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#returns">
                        <span data-feather="check-circle"></span>
                        Kelola Pengembalian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route(name: 'kategori')}}">
                        <span data-feather="tag"></span>
                        Kelola Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('user') }}">
                        <span data-feather="user"></span>
                        Kelola Staff
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>