<div class="container-fluid py-4">
    <div class="card border-0 shadow rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-semibold">Kelola Aset</h4>
            <button href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addPage">
                + Tambah Aset
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
                <input type="text" class="form-control w-50 rounded-pill px-4" placeholder="Cari Aset..."
                    wire:model.live="cari">
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap">
                    <thead class="bg-light">
                        <tr class="text-secondary">
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th class="text-end">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gedung as $data)
                            <tr class="bg-white">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($data->gambar)
                                        <img src="{{ asset('storage/' . $data->gambar) }}" width="80">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="fw-medium">{{ $data->nama }}</td>
                                <td>{{ $data->Kategori->nama }}</td>
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
                    {{ $gedung->links() }}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gedung</h5>
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
                            <label>Kategori</label>
                            <select wire:model="kategori" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" wire:model="gambar" class="form-control">
                            @error('gambar')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        
                            {{-- Preview Gambar --}}
                            @if ($gambar)
                                <img src="{{ $gambar->temporaryUrl() }}" class="img-thumbnail mt-2" width="100">
                            @endif
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Aset</h5>
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
                            <label>Kategori</label>
                            <select wire:model="kategori" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" wire:model="gambar" class="form-control">
                            @error('gambar')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        
                            {{-- ✅ Tampilkan gambar preview baru jika sedang upload --}}
                            @if ($gambar)
                                <img src="{{ $gambar->temporaryUrl() }}" class="img-thumbnail mt-2" width="100">
                            @elseif ($old_gambar)
                                {{-- ✅ Tampilkan gambar lama jika belum upload baru --}}
                                <img src="{{ asset('storage/' . $old_gambar) }}" class="img-thumbnail mt-2" width="100">
                            @endif
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