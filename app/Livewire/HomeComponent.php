<?php

namespace App\Livewire;

use App\Models\Gedung;
use App\Models\Pengembalian;
use App\Models\Pinjam;
use Livewire\Component;
use App\Models\User;

class HomeComponent extends Component
{
    public function render()
    {
        $x['title'] = "Home SIKESET";
        $data['member'] = User::where('jenis', 'mahasiswa')->count();
        $data['gedungs'] = Gedung::count();
        $data['pinjam'] = Pinjam::where('status', 'disetujui')->count();
        $data['kembali'] = Pengembalian::count();
        return view('livewire.home-component', $data)->layoutData($x);

    }
}