<?php

namespace App\Http\Controllers;

use App\Exports\PerusahaanExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new PerusahaanExport, 'dataperusahaan.xlsx');
    }
}
