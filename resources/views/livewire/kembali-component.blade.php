<div>
    <!-- Notifikasi -->
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Kelola Pengembalian -->
    <div class="container-fluid py-4">

        <!-- Kelola Pengembalian -->
        <div class="card border-0 shadow rounded-4 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-semibold">Kelola Pengembalian</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <input type="text" class="form-control w-100 rounded-pill px-4" placeholder="Cari User..."
                        wire:model.live="cari">
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle text-nowrap">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th>No.</th>
                                <th>Aset</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Kembali</th>
                                <th class="text-end">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pinjam as $data)
                                <tr class="bg-white">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->gedung->nama }}</td>
                                    <td>{{ $data->user->nama }}</td>
                                    <td>{{ $data->tanggal_pinjam }}</td>
                                    <td>{{ $data->tanggal_kembali }}</td>
                                    <td class="text-end">
                                        <button wire:click="pilih({{ $data->id }})"
                                            class="btn btn-sm btn-outline-success rounded-pill px-3" data-toggle="modal"
                                            data-target="#pilih">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada data peminjaman</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $pinjam->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- History Pengembalian -->
        <div class="card border-0 shadow rounded-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-semibold">History Pengembalian</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-nowrap">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th>No.</th>
                                <th>ID Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengembalian as $data)
                                <tr class="bg-white">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pinjam->user->nama ?? '-' }}</td>
                                    <td>{{ $data->tanggal_kembali }}</td>
                                    <td>Rp {{ number_format($data->denda, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada pengembalian</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $pengembalian->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pilih -->
        <div wire:ignore.self class="modal fade" id="pilih" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Pengembalian Gedung</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-5 font-weight-bold">Nama Gedung</div>
                            <div class="col-7">: {{ $nama }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 font-weight-bold">Nama Mahasiswa</div>
                            <div class="col-7">: {{ $user }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 font-weight-bold">Tanggal Kembali</div>
                            <div class="col-7">: {{ $tanggal_kembali }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 font-weight-bold">Tanggal Hari Ini</div>
                            <div class="col-7">: {{ date('Y-m-d') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 font-weight-bold">Status Denda</div>
                            <div class="col-7">
                                : <span class="{{ $status ? 'text-danger' : 'text-success' }}">
                                    {{ $status ? 'Telat, Ada Denda' : 'Tepat Waktu, Tidak Ada Denda' }}
                                </span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 font-weight-bold">Lama Terlambat</div>
                            <div class="col-7">: {{ $lama }} Hari</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 font-weight-bold">Jumlah Denda</div>
                            <div class="col-7">: Rp {{ number_format($denda, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" wire:click="store">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>