<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Perusahaan;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $perusahaan = Perusahaan::all();
        
        $pdf = PDF::loadView('pagepdf', compact('perusahaan'));

        return $pdf->download('dataperusahaan.pdf');
    }
}
