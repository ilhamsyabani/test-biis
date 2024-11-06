<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/pegawai', EmployeController::class);
    Route::get('/departemen', [DepartmentController::class, 'index'])->name('departemen.index');
    Route::get('/pangkat', [RoleController::class, 'index'])->name('pangkat.index');

    Route::post('/upload/photo', [EmployeController::class, 'uploadPhoto'])->name('upload.photo');
    Route::post('/upload/docs', [EmployeController::class, 'uploadDocs'])->name('upload.docs');
    Route::post('/check-email', [EmployeController::class, 'checkEmail'])->name('check.email');
});

require __DIR__ . '/auth.php';
