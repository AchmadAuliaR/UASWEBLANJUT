<?php

use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pasien', [PasienController::class, 'tampil'])->name('pasien.tampil');
Route::get('/pasien/tambah', [PasienController::class, 'tambah'])->name('pasien.tambah');
Route::post('/pasien/submit', [PasienController::class, 'submit'])->name('pasien.submit');
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
Route::post('/pasien/update/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::post('/pasien/delete/{id}', [PasienController::class, 'delete'])->name('pasien.delete');