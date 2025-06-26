<div>
    <div class="card">
        <div class="card-header">
            Kelola Kategori
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="#" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#addPage">Tambah
                    Kategori</a>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <input type="text" class="form-control w-50" placeholder="Cari User" wire:model.live="cari">
                <table class=" table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Proses</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$data->nama }}</td>
                                <td>{{$data->deskripsi}}</td>
                                <td>
                                    <a href="#" wire:click="edit({{ $data->id }})" class="btn btn-sm btn-info"
                                        data-toggle="modal" data-target="#editPage">Ubah</a>
                                    <a href="#" wire:click="confirm({{ $data->id }})" class="btn btn-sm btn-danger"
                                        data-toggle="modal" data-target="#deletePage">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $kategori->links() }}
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