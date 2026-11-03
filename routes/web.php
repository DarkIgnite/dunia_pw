<?php

use App\Http\Controllers\PerusahaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExcelController;

Route::get('/', function () {
    return view('tesreact');
});

// route export harus ditaruh SEBELUM Route::resource,
// kalau di bawahnya "dataperusahaan/pdf" bakal dianggap route show dengan id "pdf"
Route::get('dataperusahaan/pdf', [PDFController::class, 'generatePDF'])->name('dataperusahaan.pdf');
Route::get('dataperusahaan/excel', [ExcelController::class, 'exportExcel'])->name('dataperusahaan.excel');

// API routes untuk React (CRUD Perusahaan)
Route::prefix('api')->group(function () {
    Route::get('/perusahaan', [PerusahaanController::class, 'index']);
    Route::post('/perusahaan', [PerusahaanController::class, 'store']);
    Route::get('/perusahaan/{id}', [PerusahaanController::class, 'show']);
    Route::put('/perusahaan/{id}', [PerusahaanController::class, 'update']);
    Route::delete('/perusahaan/{id}', [PerusahaanController::class, 'destroy']);
});

Route::resource('dataperusahaan', PerusahaanController::class);
