<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class MemberComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama, $jurusan, $telepon, $email, $password, $cari, $id;
    public function render()
    {
        if ($this->cari != "") {
            $data['member'] = User::where('nama', 'like', '%' . $this->cari . '%')
                ->orWhere('email', 'like', '%' . $this->cari . '%')
                ->paginate(10);
        } else {
            $data['member'] = User::where('jenis', 'mahasiswa')->paginate(10);
        }
        $layout['title'] = 'Kelola Mahasiswa';
        return view('livewire.member-component', $data)->layoutData($layout);
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'telepon' => 'required',
            'email' => 'required'
        ], [
            'nama.required' => 'Nama Lengkap Tidak Boleh Kosong!',
            'jurusan.required' => 'Jurusan Tidak Boleh Kosong!',
            'telepon.required' => 'Nomor Telepon Tidak Boleh Kosong!',
            'email.required' => 'Email Tidak Boleh Kosong!'
        ]);
        User::create([
            'nama' => $this->nama,
            'jurusan' => $this->jurusan,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'jenis' => 'mahasiswa'
        ]);
        session()->flash('succes', 'Berhasil Disimpan!');
        return redirect()->route('member');
    }
    public function edit($id)
    {
        $member = User::find($id);
        $this->id = $member->id;
        $this->nama = $member->nama;
        $this->jurusan = $member->jurusan;
        $this->telepon = $member->telepon;
        $this->email = $member->email;
    }
    public function update()
    {
        $member = User::find($this->id);
        $member->update([
            'nama' => $this->nama,
            'jurusan' => $this->jurusan,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'jenis' => 'mahasiswa'
        ]);
        session()->flash('succes', 'Berhasil Diubah!');
        return redirect()->route('member');
    }
    public function confirm($id)
    {
        $this->id = $id;
    }
    public function destroy()
    {
        $member = User::find($this->id);
        $member->delete();
        session()->flash('succes', 'Berhasil Dihapus!');
        return redirect()->route('member');
    }
}