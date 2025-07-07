<?php

namespace App\Livewire;

use App\Models\Gedung;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Pinjam;
use App\Models\Member;
use Symfony\Contracts\Service\Attribute\Required;

class PinjamComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $id, $user, $gedung, $tanggal_pinjam, $tanggal_kembali, $member, $now, $kembali, $status;
    public function render()
    {
        $data['members'] = User::where('jenis', 'mahasiswa')->get();
        $data['gedungs'] = Gedung::all();
        $data['pinjam'] = Pinjam::paginate(10);
        $layout['title'] = 'Pinjam Aset';
        return view('livewire.pinjam-component', $data)->layoutData($layout);
    }
    public function store()
    {
        $this->validate(
            [
                'gedung' => 'required',
                'user' => 'required'
            ],
            [
                'gedung.required' => 'Aset Harus dipilih!',
                'user.required' => 'user harus dipilih!'
            ]
        );
        $this->tanggal_pinjam = date('Y-m-d');
        $this->tanggal_kembali = date('Y-m-d', strtotime($this->tanggal_pinjam . '+7days'));
        Pinjam::create([
            'user_id' => $this->user,
            'gedung_id' => $this->gedung,
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'tanggal_kembali' => $this->tanggal_kembali,
            'status' => 'menunggu'
        ]);
        $this->reset();
        session()->flash('success', 'Berhasil Proses Data!');
        return redirect()->route('pinjam');
    }
    public function edit($id)
    {
        $pinjam = Pinjam::find($id);
        $this->id = $pinjam->id;
        $this->user = $pinjam->user_id;
        $this->gedung = $pinjam->gedung_id;
        $this->tanggal_pinjam = $pinjam->tanggal_pinjam;
        $this->tanggal_kembali = $pinjam->tanggal_kembali;
    }
    public function update()
    {
        $pinjam = Pinjam::find($this->id);
        $this->tanggal_pinjam = date('Y-m-d');
        $this->tanggal_kembali = date('Y-m-d', strtotime($this->tanggal_pinjam . '+7 days'));
        $pinjam->update([
            'user_id' => $this->user,
            'gedung_id' => $this->gedung,
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'tanggal_kembali' => $this->tanggal_kembali,
            'status' => 'menunggu'
        ]);
        $this->reset();
        session()->flash('success', 'Berhasil Ubah Data');
        return redirect()->route('pinjam');
    }
    public function confirm($id)
    {
        $this->id = $id;
    }

    public function acc($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->status = 'disetujui';
        $pinjam->save();

        session()->flash('success', 'Peminjaman disetujui.');
    }

    public function tolak($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->status = 'ditolak';
        $pinjam->save();

        session()->flash('success', 'Peminjaman ditolak.');
    }


    public function destroy()
    {
        $pinjam = Pinjam::find($this->id);
        $pinjam->delete();
    }
}