<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\DataPendaftaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaPelatihanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SesiController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'login'])->name('login');
    Route::post('/login-proses', [SesiController::class, 'login_proses'])->name('login-proses');
    Route::get('/daftar', [SesiController::class, 'daftar'])->name('daftar');
    Route::post('/daftar-proses', [SesiController::class, 'daftar_proses'])->name('daftar-proses');

});

Route::get('/home', function () {
    return redirect('/peserta');
});
Route::get('/kontak', function () {
    return view('v_peserta_kontak');
});

Route::middleware(['auth'])->group(function () {
    ///peserta
    Route::get('/isidata', [SesiController::class, 'isidata'])->name('isidata');
    Route::post('/isidata-proses', [SesiController::class, 'isidata_proses'])->name('isidata-proses');
    // Route::get('/peserta', [AdminController::class, 'index'])->name('index');
    Route::get('/peserta', [AdminController::class, 'peserta'])->name('peserta')->middleware('userAkses:peserta');

    Route::get('/galeri/detail{id}', [GaleriController::class, 'show'])->name('galeri/detail')->middleware('userAkses:peserta');

    Route::get('/jadwalpelatihan', [PesertaPelatihanController::class, 'index'])->name('jadwalpelatihan')->middleware('userAkses:peserta');
    Route::get('/jadwalpelatihan/detail{id}', [PesertaPelatihanController::class, 'show'])->name('jadwalpelatihan/detail')->middleware('userAkses:peserta');

    Route::get('/pendaftaranpelatihan{id}', [PendaftaranController::class, 'index'])->name('pendaftaranpelatihan')->middleware('userAkses:peserta');
    Route::put('/riwayatpelatihan-proses{id}', [PendaftaranController::class, 'store'])->name('riwayatpelatihan-proses')->middleware('userAkses:peserta');
    Route::get('/riwayatpelatihan', [PendaftaranController::class, 'show'])->name('riwayatpelatihan')->middleware('userAkses:peserta');

    Route::get('/profil', [AdminController::class, 'index'])->name('profil')->middleware('userAkses:peserta');
    Route::get('/profil/edit{user_id}', [AdminController::class, 'edit'])->name('profil/edit')->middleware('userAkses:peserta');
    Route::put('/profil/edit-proses{user_id}', [AdminController::class, 'update'])->name('profil/edit-proses');
    Route::get('/berkas/edit{id}', [AdminController::class, 'berkasedit'])->name('berkas/edit')->middleware('userAkses:peserta');
    Route::put('/berkas/edit-proses{id}', [AdminController::class, 'berkasupdate'])->name('berkas/edit-proses');
    ///endpeserta///

    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

    /// admin ///
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin')->middleware('userAkses:admin');
    Route::get('/admin/profil', [AdminController::class, 'admin_profil'])->name('admin/profil')->middleware('userAkses:admin');
    Route::get('/admin/profil/update', [AdminController::class, 'admin_profiledit'])->name('admin/profil/update')->middleware('userAkses:admin');
    Route::patch('/admin/profil/update-proses{id}', [AdminController::class, 'admin_update'])->name('admin/profil/update-proses');

    Route::get('/admin/peserta', [PesertaController::class, 'index'])->name('admin/peserta')->middleware('userAkses:admin');
    Route::get('/admin/peserta/edit{id}', [PesertaController::class, 'edit'])->name('admin/peserta/edit')->middleware('userAkses:admin');
    Route::put('/admin/peserta/edit-proses', [PesertaController::class, 'update'])->name('admin/peserta/edit-proses')->middleware('userAkses:admin');
    Route::get('/admin/peserta/hapus{id}', [PesertaController::class, 'destroy'])->name('admin/peserta/hapus')->middleware('userAkses:admin');

    Route::get('/admin/pesertabelumlulus', [PesertaController::class, 'indexbelumlulus'])->name('admin/pesertabelumlulus')->middleware('userAkses:admin');
    Route::get('/admin/pesertabelumlulus/edit{id}', [PesertaController::class, 'editbelumlulus'])->name('admin/pesertabelumlulus/edit')->middleware('userAkses:admin');
    Route::put('/admin/pesertabelumlulus/edit-proses', [PesertaController::class, 'updatebelumlulus'])->name('admin/pesertabelumlulus/edit-proses')->middleware('userAkses:admin');
    Route::get('/admin/pesertabelumlulus/hapus{id}', [PesertaController::class, 'destroybelumlulus'])->name('admin/pesertabelumlulus/hapus')->middleware('userAkses:admin');

    Route::get('/admin/pesertalulus', [PesertaController::class, 'indexlulus'])->name('admin/pesertalulus')->middleware('userAkses:admin');
    Route::get('/admin/pesertalulus/edit{id}', [PesertaController::class, 'editlulus'])->name('admin/pesertalulus/edit')->middleware('userAkses:admin');
    Route::put('/admin/pesertalulus/edit-proses', [PesertaController::class, 'updatelulus'])->name('admin/pesertalulus/edit-proses')->middleware('userAkses:admin');
    Route::get('/admin/pesertalulus/hapus{id}', [PesertaController::class, 'destroylulus'])->name('admin/pesertalulus/hapus')->middleware('userAkses:admin');

    Route::get('/admin/pendaftaran', [DataPendaftaranController::class, 'index'])->name('admin/pendaftaran')->middleware('userAkses:admin');
    Route::get('/admin/pendaftaran/edit{id}', [DataPendaftaranController::class, 'edit'])->name('admin/pendaftaran/edit')->middleware('userAkses:admin');
    Route::put('/admin/pendaftaran/edit-proses', [DataPendaftaranController::class, 'update'])->name('admin/pendaftaran/edit-proses')->middleware('userAkses:admin');
    Route::get('/admin/pendaftaran/hapus{id}', [DataPendaftaranController::class, 'destroy'])->name('admin/pendaftaran/hapus')->middleware('userAkses:admin');

    Route::get('/admin/pelatihan', [PelatihanController::class, 'index'])->name('admin/pelatihan')->middleware('userAkses:admin');
    Route::get('/admin/pelatihan/tambah', [PelatihanController::class, 'create'])->name('admin/pelatihan/tambah')->middleware('userAkses:admin');
    Route::post('/admin/pelatihan/tambah-proses', [PelatihanController::class, 'store'])->name('admin/pelatihan/tambah-proses')->middleware('userAkses:admin');
    Route::get('/admin/pelatihan/edit{id}', [PelatihanController::class, 'edit'])->name('admin/pelatihan/edit')->middleware('userAkses:admin');
    Route::put('/admin/pelatihan/edit-proses{id}', [PelatihanController::class, 'update'])->name('admin/pelatihan/edit-proses')->middleware('userAkses:admin');
    Route::get('/admin/pelatihan/hapus{id}', [PelatihanController::class, 'destroy'])->name('admin/pelatihan/hapus')->middleware('userAkses:admin');

    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin/galeri')->middleware('userAkses:admin');
    Route::get('/admin/galeri/tambah', [GaleriController::class, 'create'])->name('admin/galeri/tambah')->middleware('userAkses:admin');
    Route::post('/admin/galeri/tambah-proses', [GaleriController::class, 'store'])->name('admin/galeri/tambah-proses')->middleware('userAkses:admin');
    Route::get('/admin/galeri/edit{id}', [GaleriController::class, 'edit'])->name('admin/galeri/edit')->middleware('userAkses:admin');
    Route::put('/admin/galeri/edit-proses{id}', [GaleriController::class, 'update'])->name('admin/galeri/edit-proses')->middleware('userAkses:admin');
    Route::get('/admin/galeri/hapus{id}', [GaleriController::class, 'destroy'])->name('admin/galeri/hapus')->middleware('userAkses:admin');
    /// end admin ////

    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});
