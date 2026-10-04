<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/pegawai/{id}', [PegawaiController::class, 'show']);
    
    Route::get('/master/{type}', [App\Http\Controllers\MasterDataController::class, 'index']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
});
