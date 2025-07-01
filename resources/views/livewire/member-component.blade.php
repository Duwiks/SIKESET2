<div class="container-fluid py-4">
    <div class="card border-0 shadow rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-semibold">Kelola Mahasiswa</h4>
            <button href="#" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#addPage">+
                Tambah
                User</button>
        </div>
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <input type="text" class="form-control w-100 rounded-pill px-4" placeholder="Cari Mahasiswa..."
                    wire:model.live="cari">
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap">
                    <thead class="bg-light">
                        <tr class="text-secondary">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th class="text-end">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member as $data)
                            <tr class="bg-white">
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $data->nama }}</td>
                                <td>{{ $data->jurusan }}</td>
                                <td>{{ $data->telepon }}</td>
                                <td>{{ $data->email }}</td>
                                <td class="text-end">
                                    <a href="#" wire:click="edit({{ $data->id }})"
                                        class="btn btn-sm btn-outline-primary rounded-pill me-2 px-3" data-toggle="modal"
                                        data-target="#editPage">Ubah</a>
                                    <a href="#" wire:click="confirm({{ $data->id }})"
                                        class="btn btn-sm btn-outline-danger rounded-pill rounded-pill px-3"
                                        data-toggle="modal" data-target="#deletePage">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $member->links() }}
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
                            <label>Nama</label>
                            <input type="text" wire:model="nama" class="form-control" placeholder="Masukkan Nama"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" wire:model="jurusan" class="form-control" placeholder="Masukkan Jurusan"
                                value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" wire:model="telepon" class="form-control" placeholder="Masukkan No Telp."
                                value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" wire:model="email" class="form-control" placeholder="Masukkan Email"
                                value="{{ old('email') }}">
                            @error('email')
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
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
                            <label>Jurusan</label>
                            <input type="text" wire:model="jurusan" class="form-control" placeholder="Masukkan Jurusan"
                                value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" wire:model="telepon" class="form-control" placeholder="Masukkan No Telp."
                                value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" wire:model="email" class="form-control" placeholder="Masukkan Email"
                                value="{{ old('email') }}">
                            @error('email')
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