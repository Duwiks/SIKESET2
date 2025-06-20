<?php

use App\Livewire\HomeComponent;
use App\Livewire\LoginComponent;
use App\Livewire\UserComponent;
use App\Livewire\MemberComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->middleware('auth')->name('home');
Route::get('/user', UserComponent::class)->name('user')->middleware('auth');
Route::get('/member', MemberComponent::class)->name('member')->middleware('auth');

Route::get('/login', LoginComponent::class)->name('login');

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');