<?php

namespace App\Livewire;

use App\Models\Gedung;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class GedungComponent extends Component
{
    use WithoutUrlPagination, WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $id, $kategori, $nama, $cari;

    public function render()
    {
        if ($this->cari != '') {
            $data['gedung'] = Gedung::where('judul', 'like', '%' . $this->cari . '%')->paginate(10);
        } else {
            $data['gedung'] = Gedung::paginate(10);
        }

        $data['category'] = Kategori::all();
        $layout['title'] = 'Kelola Gedung';

        return view('livewire.gedung-component', $data)->layoutData($layout);
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'kategori' => 'required'
        ], [
            'nama' => 'nama tidak boleh kosong',
            'kategori.required' => 'Kategori tidak boleh kosong',
        ]);

        Gedung::create([
            'nama' => $this->nama,
            'kategori_id' => $this->kategori
        ]);
        $this->reset();
        session()->flash('success', 'Berhasil Tambah');
        return redirect()->route('gedung');
    }
    public function edit($id)
    {
        $gedung = Gedung::find($id);
        $this->id = $gedung->id;
        $this->nama = $gedung->nama;
        $this->kategori = $gedung->kategori->id;
    }
    public function update()
    {
        $gedung = Gedung::find($this->id);
        $gedung->update([
            'nama' => $this->nama,
            'kategori_id' => $this->kategori
        ]);
        $this->reset();
        session()->flash('success', 'Berhasil Ubah');
        return redirect()->route('gedung');
    }
    public function confirm($id)
    {
        $this->id = $id;
    }
    public function destroy()
    {
        $gedung = Gedung::find($this->id);
        $gedung->delete();
        session()->flash('success', 'Berhasil Hapus!');
        return redirect()->route('gedung');
    }
}
