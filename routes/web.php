<?php

use App\Http\Controllers\LogHarianController;
use App\Http\Controllers\VerifikasiLogHarianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionWebController;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\HelloworldController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect()->route('log.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/verifikasi-log', [VerifikasiLogHarianController::class, 'index'])->name('verifikasi-log.index');
    Route::put('/verifikasi-log/{log}', [VerifikasiLogHarianController::class, 'update'])->name('verifikasi-log.update');
    Route::get('/log-harian/create', [LogHarianController::class, 'create'])->name('log.create');
    Route::post('/log-harian', [LogHarianController::class, 'store'])->name('log.store');
    Route::get('/log-harian', [LogHarianController::class, 'index'])->name('log.index');
    Route::get('/log-harian/{log}/edit', [LogHarianController::class, 'edit'])->name('log.edit');
    Route::put('/log-harian/{log}', [LogHarianController::class, 'update'])->name('log.update');
    Route::delete('/log-harian/{log}', [LogHarianController::class, 'destroy'])->name('log.destroy');
    Route::get('/log-saya', [LogHarianController::class, 'logSaya'])->name('log-saya');

    //provinsi API
    Route::resource('provinsi', RegionWebController::class);

    //cek predikat kinerja route
    Route::get('/predikat', [KinerjaController::class, 'showPredikatKinerja'])->name('predikat');

    //heloword route
    Route::get('/helloworld', [HelloworldController::class, 'index'])->name('helloworld');
});

require __DIR__ . '/auth.php';
