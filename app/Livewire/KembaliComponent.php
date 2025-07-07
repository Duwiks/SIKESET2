<?php

namespace App\Livewire;

use DateTime;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\Pinjam;
use App\Models\Pengembalian;

class KembaliComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $id;
    public $nama;
    public $user;
    public $tanggal_kembali;
    public $lama;
    public $status;
    public $denda;
    public $cari = '';

    public function render()
    {
        $data['pinjam'] = Pinjam::with(['gedung', 'user'])
            ->where('status', 'disetujui')
            ->whereHas('user', function ($query) {
                $query->where('nama', 'like', '%' . $this->cari . '%');
            })
            ->paginate(10);

        $data['pengembalian'] = Pengembalian::latest()->paginate(10);

        $layout['title'] = 'Pengembalian Aset';

        return view('livewire.kembali-component', $data)->layoutData($layout);
    }

    public function pilih($id)
    {
        $pinjam = Pinjam::with(['gedung', 'user'])->findOrFail($id);

        $this->id = $pinjam->id;
        $this->nama = $pinjam->gedung->nama ?? '-';
        $this->user = $pinjam->user->nama ?? '-';
        $this->tanggal_kembali = $pinjam->tanggal_kembali;

        $kembali = new DateTime($this->tanggal_kembali);
        $today = new DateTime();
        $selisih = $today->diff($kembali);

        $this->status = $selisih->invert === 1; // true jika terlambat
        $this->lama = $this->status ? $selisih->days : 0;
        $this->denda = $this->lama * 1000;
    }

    public function store()
    {
        $denda = $this->status ? $this->lama * 1000 : 0;

        Pengembalian::create([
            'pinjam_id' => $this->id,
            'tanggal_kembali' => now()->format('Y-m-d'),
            'denda' => $denda,
        ]);

        $pinjam = Pinjam::find($this->id);
        if ($pinjam) {
            $pinjam->status = 'selesai'; // ✅ ubah status ke selesai
            $pinjam->save();
        }

        $this->resetInput();
        session()->flash('success', 'Berhasil memproses pengembalian.');
        return redirect()->route('kembali');
    }

    public function tandaiKembali($id)
    {
        $pinjam = Pinjam::find($id);
        if ($pinjam) {
            $pinjam->status = 'selesai'; // ✅ pastikan enum di database support 'selesai'
            $pinjam->save();

            // Simpan ke histori jika belum ada
            Pengembalian::firstOrCreate(
                ['pinjam_id' => $pinjam->id],
                [
                    'tanggal_kembali' => now()->format('Y-m-d'),
                    'denda' => 0,
                ]
            );

            session()->flash('success', 'Aset berhasil ditandai sebagai dikembalikan.');
        }
    }

    private function resetInput()
    {
        $this->id = null;
        $this->nama = null;
        $this->user = null;
        $this->tanggal_kembali = null;
        $this->lama = 0;
        $this->status = null;
        $this->denda = 0;
    }
}