<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\User;

class UserComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $nama, $jurusan, $telepon, $email, $password, $cari, $id;
    public function render()
    {
        $layout['title'] = "Kelola User";
        if ($this->cari != "") {
            $data['user'] = User::where('nama', 'like', '%' . $this->cari . '%')
                ->orWhere('jurusan', 'like', '%' . $this->cari . '%')
                ->orWhere('telepon', 'like', '%' . $this->cari . '%')
                ->orWhere('email', 'like', '%' . $this->cari . '%')
                ->orWhere('jenis', 'like', '%' . $this->cari . '%')
                ->paginate(10);
        } else {
            $data['user'] = User::paginate(5);
        }
        return view('livewire.user-component', $data)->layoutData($layout);
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);
        User::create([
            'nama' => $this->nama,
            'jurusan' => $this->jurusan,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'password' => $this->password,
            'jenis' => 'admin'
        ]);
        session()->flash('success', 'User berhasil ditambahkan');
        $this->reset();
    }
    public function edit($id)
    {
        $user = User::find($id);
        $this->nama = $user->nama;
        $this->jurusan = $user->jurusan;
        $this->telepon = $user->telepon;
        $this->email = $user->email;
        $this->id = $user->id;
    }
    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
        ], [
            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid'
        ]);
        $user = User::find($this->id);
        if ($this->password == "") {
            $user->update([
                'nama' => $this->nama,
                'jurusan' => $this->jurusan,
                'telepon' => $this->telepon,
                'email' => $this->email
            ]);
        } else {
            $user->update([
                'nama' => $this->nama,
                'jurusan' => $this->jurusan,
                'telepon' => $this->telepon,
                'email' => $this->email,
                'password' => $this->password
            ]);
        }
        session()->flash('success', 'User berhasil diperbarui');
        $this->reset();
    }
    public function confirm($id)
    {
        $this->id = $id;
    }
    public function destroy()
    {
        $user = User::find($this->id);
        if ($user) {
            $user->delete();
            session()->flash('success', 'User berhasil dihapus');
        } else {
            session()->flash('error', 'User tidak ditemukan');
        }
        $this->reset();
    }
}