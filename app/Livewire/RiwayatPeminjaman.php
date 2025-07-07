<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Auth;

class RiwayatPeminjaman extends Component
{
    use WithPagination;

    public function render()
    {
        $peminjamans = Pinjam::with('gedung')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(5);

        return view('livewire.riwayat-peminjaman', compact('peminjamans'))
            ->layout('components.layouts.blank');
    }
}
