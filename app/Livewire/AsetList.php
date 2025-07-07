<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Auth;

class AsetList extends Component
{
    use WithPagination;

    public $kategori_id = '';
    public $showModal = false;
    public $gedung_id;
    public $tanggal_pinjam;
    public $tanggal_kembali;
    public $keterangan;

    public function updatingKategoriId()
    {
        $this->resetPage();
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

        $this->reset(['gedung_id', 'tanggal_pinjam', 'tanggal_kembali', 'keterangan', 'showModal']);
        session()->flash('success', 'Permintaan peminjaman berhasil diajukan.');
    }
    
    public function render()
    {
        $kategoris = Kategori::all() ?? collect(); // fallback agar tidak null

        $gedungs = Gedung::with('kategori')
            ->when($this->kategori_id, function ($query) {
                $query->where('kategori_id', $this->kategori_id);
            })
            ->latest()
            ->paginate(9);
    
        return view('livewire.aset-list', compact('gedungs', 'kategoris'))
            ->layout('components.layouts.blank');
    }

    public function filterKategori()
    {
        // kosong saja, cukup untuk trigger render ulang
    }


}
