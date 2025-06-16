<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email, $password;
    public function render()
    {
        return view('livewire.login-component')->layout('components.layouts.login');
    }
    public function proses()
    {
        $credential = $this->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong'
            ]
        );

        if (Auth::attempt($credential)) {
            session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->onlyInput('email');
    }

    public function keluar()
    {
        if (auth()->check()) {
            return redirect()->route('home'); // Redirect ke home jika sudah login
        }
    }
}