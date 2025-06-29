<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginMahasiswa extends Component
{
    public $email, $nama;
    public $showSuccessModal = false;

    public function render()
    {
        return view('livewire.login-mahasiswa')->layout('components.layouts.blank');
    }

    public function proses()
    {
        $this->validate([
            'email' => 'required|email',
            'nama' => 'required',
        ]);

        $user = User::where('email', $this->email)->first();

        if ($user) {
            if ($user->nama === $this->nama) {
                Auth::login($user);
                // Hapus session()->regenerate(); di sini
                $this->showSuccessModal = true;
                return;
            } else {
                session()->flash('error', 'Nama tidak sesuai dengan email.');
                $this->reset('nama');
                return;
            }
        }

        session()->flash('error', 'Email belum terdaftar.');
        $this->reset(['email', 'nama']);
    }

    public function closeSuccessModal()
    {
        return redirect()->route('sikeset'); // langsung redirect saat tombol "Tutup" diklik
    }
}