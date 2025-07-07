<?php

namespace App\Livewire;

use App\Models\Pinjam;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public function render()
    {
        $peminjamans = Pinjam::with('gedung')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.profile', compact('peminjamans'))
            ->layout('components.layouts.blank');
    }

    public function batalkan($id)
{
    $pinjam = \App\Models\Pinjam::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
    if ($pinjam->status === 'pending') {
        $pinjam->delete();
        session()->flash('message', 'Peminjaman dibatalkan.');
    }
}

public function pinjamLagi($gedungId)
{
    // contoh insert ulang
    \App\Models\Pinjam::create([
        'user_id' => auth()->id(),
        'gedung_id' => $gedungId,
        'tanggal_pinjam' => now(),
        'tanggal_kembali' => now()->addDays(3),
        'status' => 'pending',
    ]);
    session()->flash('message', 'Permintaan peminjaman ulang berhasil diajukan.');
}
}
