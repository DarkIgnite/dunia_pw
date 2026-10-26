<?php

use App\Http\Controllers\PerusahaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExcelController;

Route::get('/', function () {
    return view('welcome');
});

// route export harus ditaruh SEBELUM Route::resource,
// kalau di bawahnya "dataperusahaan/pdf" bakal dianggap route show dengan id "pdf"
Route::get('dataperusahaan/pdf', [PDFController::class, 'generatePDF'])->name('dataperusahaan.pdf');
Route::get('dataperusahaan/excel', [ExcelController::class, 'exportExcel'])->name('dataperusahaan.excel');

Route::resource('dataperusahaan', PerusahaanController::class);
