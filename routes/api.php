<?php

use App\Http\Controllers\Api\EmployeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pegawai', [EmployeController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/{id}', [EmployeController::class, 'show'])->name('pegawai.show');