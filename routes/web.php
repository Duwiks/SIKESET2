<?php

use App\Livewire\GedungComponent;
use App\Livewire\HomeComponent;
use App\Livewire\KategoriComponent;
use App\Livewire\LoginComponent;
use App\Livewire\PinjamComponent;
use App\Livewire\UserComponent;
use App\Livewire\MemberComponent;
use App\Livewire\Sikeset;
use Illuminate\Support\Facades\Route;

Route::get('/', Sikeset::class)->name('sikeset');
Route::get('/home', HomeComponent::class)->middleware('auth')->name('home');
Route::get('/user', UserComponent::class)->name('user')->middleware('auth');
Route::get('/member', MemberComponent::class)->name('member')->middleware('auth');
Route::get('/kategori', KategoriComponent::class)->name('kategori')->middleware('auth');
Route::get('/gedung', GedungComponent::class)->name('gedung')->middleware('auth');
Route::get('/pinjam', PinjamComponent::class)->name('pinjam')->middleware('auth');


Route::get('/login', LoginComponent::class)->name('login');
Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');