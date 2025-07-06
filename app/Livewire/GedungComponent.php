<?php

namespace App\Livewire;

use App\Models\Gedung;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\WithFileUploads;

class GedungComponent extends Component
{
    use WithoutUrlPagination, WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $id, $kategori, $nama, $cari;
    public $gambar, $old_gambar;

    public function render()
    {
        if ($this->cari != '') {
            $data['gedung'] = Gedung::where('nama', 'like', '%' . $this->cari . '%')->paginate(10);
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
            'kategori' => 'required',
            'gambar' => 'nullable|image|max:2048', // max 2MB
        ]);
    
        $fileName = null;
        if ($this->gambar) {
            $fileName = $this->gambar->store('gedungs', 'public');
        }
    
        Gedung::create([
            'nama' => $this->nama,
            'kategori_id' => $this->kategori,
            'gambar' => $fileName
        ]);
    
        $this->reset(['id', 'nama', 'kategori', 'gambar']);
        session()->flash('success', 'Berhasil Tambah');
        return redirect()->route('gedung');
    }
    public function edit($id)
{
    $gedung = Gedung::find($id);
    $this->id = $gedung->id;
    $this->nama = $gedung->nama;
    $this->kategori = $gedung->kategori_id;
    $this->old_gambar = $gedung->gambar; // ✅ simpan gambar lama
}

public function update()
{
    $this->validate([
        'nama' => 'required',
        'kategori' => 'required',
        'gambar' => 'nullable|image|max:2048' // ✅ validasi gambar opsional
    ]);

    $gedung = Gedung::find($this->id);

    if ($this->gambar) {
        // Hapus gambar lama kalau ada
        if ($gedung->gambar && \Storage::exists('public/' . $gedung->gambar)) {
            \Storage::delete('public/' . $gedung->gambar);
        }

        // Simpan gambar baru
        $gambarBaru = $this->gambar->store('gedung', 'public');
    } else {
        $gambarBaru = $gedung->gambar;
    }

    $gedung->update([
        'nama' => $this->nama,
        'kategori_id' => $this->kategori,
        'gambar' => $gambarBaru
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
