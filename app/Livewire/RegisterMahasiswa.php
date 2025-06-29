<?php
namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule; // Tambahkan ini

class RegisterMahasiswa extends Component
{
    public $nama, $jurusan, $telepon, $email;
    public $showSuccessModal = false;

    public function render()
    {
        return view('livewire.register-mahasiswa')->layout('components.layouts.blank');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'telepon' => 'required|string|min:5|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->whereNull('deleted_at'), // Ubah di sini
            ],
        ]);

        User::create([
            'nama' => $this->nama,
            'jurusan' => $this->jurusan,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'jenis' => 'mahasiswa',
        ]);

        $this->reset(['nama', 'jurusan', 'telepon', 'email']);
        $this->showSuccessModal = true;
    }

    // Method untuk menutup modal dan redirect ke login
    public function closeSuccessModal()
    {
        $this->showSuccessModal = false;
        return redirect()->route('login-mahasiswa');
    }
}