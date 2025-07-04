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
    public $id, $nama, $user, $tanggal_kembali, $lama, $status;
    public function render()
    {
        $layout['title'] = 'Pengembalian Gedung';
        $data['pinjam'] = Pinjam::where('status', 'menunggu')->paginate(10);
        $data['pengembalian'] = Pengembalian::paginate(10);
        return view('livewire.kembali-component', $data)->layoutData($layout);
    }
    public function pilih($id)
    {
        $pinjam = Pinjam::find($id);
        $this->nama = $pinjam->gedung->nama;
        $this->user = $pinjam->user->nama;
        $this->tanggal_kembali = $pinjam->tanggal_kembali;
        $this->id = $pinjam->id;

        $kembali = new DateTime($this->tanggal_kembali);
        $today = new DateTime();
        $selisih = $today->diff($kembali);
        //$this->status = $selisih->invert;
        if ($selisih->invert == 1) {
            $this->status = true;

        } else {
            $this->status = false;
        }
        $this->lama = $selisih->d;

    }
    public function store()
    {
        if ($this->status == true) {
            $denda = $this->lama * 1000;
        } else {

            $denda = 0;
        }
        $pinjam = Pinjam::find($this->id);
        Pengembalian::create([
            'pinjam_id' => $this->id,
            'tanggal_kembali' => date('Y-m-d'),

        ]);
        $pinjam->update([
            'status' => 'disetujui'
        ]);
        $this->reset();
        session()->flash('success', 'Berhasil Proses Data!');
        return redirect()->route('kembali');
    }

}
