<?php

namespace App\Exports;

use App\Models\Perusahaan;
use Illuminate\Support\Enumerable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PerusahaanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    // ambil data yang mau diexport
    public function collection(): Enumerable
    {
        return Perusahaan::select('nama_perusahaan', 'bidang', 'alamat', 'telepon')->get();
    }

    // judul kolom di baris pertama excel
    public function headings(): array
    {
        return ['Nama Perusahaan', 'Bidang', 'Alamat', 'Telepon'];
    }
}
