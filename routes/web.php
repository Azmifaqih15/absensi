<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return redirect('/karyawan');
});

Route::resource('/karyawan', KaryawanController::class);
Route::get('/absensi', [AbsensiController::class, 'index']);
Route::post('/absensi/masuk', [AbsensiController::class, 'absenMasuk']);
Route::post('/absensi/pulang', [AbsensiController::class, 'absenPulang']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
