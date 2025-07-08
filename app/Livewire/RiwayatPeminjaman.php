<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Auth;

class RiwayatPeminjaman extends Component
{
    use WithPagination;

    public $name;
    public $email;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->nama;
        $this->email = $user->email;
    }

    public function render()
    {
        $peminjamans = Pinjam::with(['gedung', 'pengembalian']) // include pengembalian
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(5);

        return view('livewire.riwayat-peminjaman', [
            'peminjamans' => $peminjamans,
            'name' => $this->name,
            'email' => $this->email,
        ])->layout('components.layouts.blank');
    }
}