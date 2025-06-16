<div>
    <div class="card">
        <div class="card-header">
            Kelola User
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="#" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#addPage">Tambah
                    User</a>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>{{$data->jurusan}}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->jenis }}</td>
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
                {{ $user->links() }}
            </div>
        </div>

        <!-- Modal Tambah -->
        <div wire:ignore.self class="modal fade" id="addPage" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
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
                                <input type="text" wire:model="jurusan" class="form-control"
                                    placeholder="Masukkan Jurusan" value="{{ old('jurusan') }}">
                                @error('jurusan')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" wire:model="telepon" class="form-control"
                                    placeholder="Masukkan No Telp." value="{{ old('telepon') }}">
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
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" wire:model="password" class="form-control"
                                    placeholder="Masukkan Password" value="{{ old('passwrod') }}">
                                @error('password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" wire:click="store" class="btn btn-primary" data-dismiss="modal">Save
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
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
                                <input type="text" wire:model="jurusan" class="form-control"
                                    placeholder="Masukkan Jurusan" value="{{ old('jurusan') }}">
                                @error('jurusan')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" wire:model="telepon" class="form-control"
                                    placeholder="Masukkan No Telp." value="{{ old('telepon') }}">
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
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" wire:model="password" class="form-control"
                                    placeholder="Masukkan Password" value="{{ old('passwrod') }}">
                                @error('password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" wire:click="update" class="btn btn-primary" data-dismiss="modal">Save
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