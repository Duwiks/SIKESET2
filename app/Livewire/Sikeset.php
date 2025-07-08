<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gedung;
use App\Models\Pinjam;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Sikeset extends Component
{
    public $gedungs;
    public $users;

    public $gedung_id;
    public $tanggal_pinjam;
    public $tanggal_kembali;
    public $keterangan;

    public $showModal = false;
    public $showSuccessModal = false; // ✅ modal sukses

    public function mount()
    {
        $this->gedungs = Gedung::with('kategori')->latest()->get();
        $this->users = User::count(); // jumlah semua user
    }

    public function render()
    {
        return view('livewire.sikeset')->layout('components.layouts.blank');
    }

    public function bukaModal($id)
    {
        $this->gedung_id = $id;
        $this->tanggal_pinjam = now()->toDateString();
        $this->tanggal_kembali = now()->addDays(7)->toDateString();
        $this->showModal = true;
    }

    public function tutupModal()
    {
        $this->showModal = false;
    }

    public function closeSuccessModal()
    {
        $this->showSuccessModal = false;
    }

    public function pinjam()
    {
        $this->validate([
            'gedung_id' => 'required|exists:gedungs,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'keterangan' => 'nullable|string|max:255'
        ]);

        Pinjam::create([
            'user_id' => Auth::id(),
            'gedung_id' => $this->gedung_id,
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'tanggal_kembali' => $this->tanggal_kembali,
            'keterangan' => $this->keterangan ?? '',
            'status' => 'menunggu'
        ]);

        // ✅ Reset input dan modal
        $this->reset(['gedung_id', 'tanggal_pinjam', 'tanggal_kembali', 'keterangan', 'showModal']);

        // ✅ Tampilkan modal sukses
        $this->showSuccessModal = true;
    }
}