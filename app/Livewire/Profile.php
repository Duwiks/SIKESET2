<?php
namespace App\Livewire;

use App\Models\Pinjam;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $name, $email, $telepon, $user_id, $jurusan;
    public $editMode = false;

    public function mount()
    {
        $user = Auth::user();
        $this->user_id = $user->id;
        $this->name = $user->nama;
        $this->jurusan = $user->jurusan;
        $this->email = $user->email;
        $this->telepon = $user->telepon;
    }

    public function render()
    {
        $peminjamans = Pinjam::with('gedung')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $layout['title'] = 'Profil Pengguna';

        return view('livewire.profile', compact('peminjamans'))
            ->layout('components.layouts.blank', $layout);
    }

    public function enableEdit()
    {
        $this->editMode = true;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'telepon' => 'required|string|max:20',
        ], [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'telepon.required' => 'Nomor telepon tidak boleh kosong!',
        ]);

        $user = User::findOrFail($this->user_id);
        $user->nama = $this->name;
        $user->jurusan = $this->jurusan;
        $user->email = $this->email;
        $user->telepon = $this->telepon;
        $user->save();

        $this->editMode = false;
        session()->flash('message', 'Profil berhasil diperbarui.');
    }

    public function batalkan($id)
    {
        $pinjam = Pinjam::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
        if ($pinjam->status === 'pending') {
            $pinjam->delete();
            session()->flash('message', 'Peminjaman dibatalkan.');
        }
    }

    public function pinjamLagi($gedungId)
    {
        Pinjam::create([
            'user_id' => auth()->id(),
            'gedung_id' => $gedungId,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(3),
            'status' => 'pending',
        ]);
        session()->flash('message', 'Permintaan peminjaman ulang berhasil diajukan.');
    }

    public function confirm($id)
    {
        $this->user_id = $id;
    }
}