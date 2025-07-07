<div class="container-fluid py-4">
    <div class="card border-0 shadow rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-semibold">Kelola Peminjaman</h4>
            <button href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addPage">
                + Tambah
            </button>
        </div>
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <input type="text" class="form-control w-100 rounded-pill px-4" placeholder="Cari User..."
                    wire:model.live="cari">
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap">
                    <thead class="bg-light">
                        <tr class="text-secondary">
                            <th>No.</th>
                            <th>Aset</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th class="text-end">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pinjam as $data)
                            <tr class="bg-white">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->gedung->nama }}</td>
                                <td>{{ $data->user->nama }}</td>
                                <td>{{ $data->tanggal_pinjam }}</td>
                                <td>{{ $data->tanggal_kembali }}</td>
                                <td> <span class="badge 
                                    @if($data->status == 'menunggu') bg-secondary
                                    @elseif($data->status == 'disetujui') bg-success
                                    @elseif($data->status == 'ditolak') bg-danger
                                    @endif">
                                        {{ ucfirst($data->status) }}
                                    </span></td>
                                <td class="text-end">
                                    <a href="#" wire:click="edit({{ $data->id }})"
                                        class="btn btn-sm btn-outline-primary rounded-pill me-2 px-3" data-toggle="modal"
                                        data-target="#editPage">Ubah</a>
                                    <a href="#" wire:click="confirm({{ $data->id }})"
                                        class="btn btn-sm btn-outline-danger rounded-pill px-3" data-toggle="modal"
                                        data-target="#deletePage">Hapus</a>

                                    @if($data->status === 'menunggu')
                                        <button wire:click="acc({{ $data->id }})"
                                            class="btn btn-sm btn-success rounded-pill me-2 px-3">ACC</button>
                                        <button wire:click="tolak({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill me-2 px-3">Tolak</button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $pinjam->links() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="addPage" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama Aset</label>
                            <select wire:model="gedung" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($gedungs as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('gedung')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <select wire:model="user" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($members as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('user')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="store" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="editPage" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama Aset</label>
                            <select wire:model="gedung" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($gedungs as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('gedung')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <select wire:model="user" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($members as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('user')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="update" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div wire:ignore.self class="modal fade" id="deletePage" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Yakin Ingin Dihapus</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="destroy" class="btn btn-primary" data-dismiss="modal">
                        Hapus Data</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>