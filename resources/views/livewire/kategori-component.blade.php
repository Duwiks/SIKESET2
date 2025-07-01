<div class="container-fluid py-4">
    <div class="card border-0 shadow rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-semibold">Kelola Kategori</h4>
            <button href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addPage">
                + Tambah Kategori
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
                <input type="text" class="form-control w-100 rounded-pill px-4" placeholder="Cari Kategori..."
                    wire:model.live="cari">
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $data)
                            <tr class="bg-white">
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $data->nama }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td class="text-end">
                                    <a href="#" wire:click="edit({{ $data->id }})"
                                        class="btn btn-sm btn-outline-primary rounded-pill me-2 px-3" data-toggle="modal"
                                        data-target="#editPage">Ubah</a>
                                    <a href="#" wire:click="confirm({{ $data->id }})"
                                        class="btn btn-sm btn-outline-danger rounded-pill px-3" data-toggle="modal"
                                        data-target="#deletePage">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $kategori->links() }}
                </div>
            </div>
        </div>


        <!-- Modal Tambah -->
        <div wire:ignore.self class="modal fade" id="addPage" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" wire:model="nama" class="form-control" placeholder="Masukkan Nama"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" wire:model="deskripsi" class="form-control"
                                    placeholder="Masukkan Deskripsi" value="{{ old('deskripsi') }}">
                                @error('deskripsi')
                                    <div class="form-text text-danger">{{ $message }}</div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" wire:model="nama" class="form-control" placeholder="Masukkan Nama"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" wire:model="deskripsi" class="form-control"
                                    placeholder="Masukkan Deskripsi" value="{{ old('Deskripsi') }}">
                                @error('deskripsi')
                                    <div class="form-text text-danger">{{ $message }}</div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
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