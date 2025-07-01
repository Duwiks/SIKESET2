<div>
    <div id="dashboard" class="mb-4">
        <h2>Overview</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">
                        <span data-feather="users" class="mr-2"></span> Members
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total: {{ $member }}</h5>
                        <p class="card-text">Mahasiswa Peminjam</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <span data-feather="book" class="mr-2"></span> Aset
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total: {{ $gedungs }}</h5>
                        <p class="card-text">Available Aset</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">
                        <span data-feather="file-text" class="mr-2"></span> Peminjaman
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Peminjaman: {{ $pinjam }}</h5>
                        <p class="card-text">Peminjaman</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">
                        <span data-feather="clock" class="mr-2"></span> Returns
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pengembalian: {{ $kembali }}</h5>
                        <p class="card-text">Pengembalian</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>