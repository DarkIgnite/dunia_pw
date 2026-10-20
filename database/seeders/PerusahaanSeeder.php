<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Seed the perusahaans table.
     */
    public function run(): void
    {
        $data = [
            ['nama_perusahaan' => 'PT Maju Jaya Abadi', 'bidang' => 'Teknologi Informasi', 'alamat' => 'Jl. Sudirman No. 12, Jakarta', 'telepon' => '021-5551234'],
            ['nama_perusahaan' => 'PT Sinar Nusantara', 'bidang' => 'Manufaktur', 'alamat' => 'Jl. Raya Bekasi Km 21, Bekasi', 'telepon' => '021-8845672'],
            ['nama_perusahaan' => 'CV Berkah Mandiri', 'bidang' => 'Perdagangan', 'alamat' => 'Jl. Asia Afrika No. 45, Bandung', 'telepon' => '022-4231890'],
            ['nama_perusahaan' => 'PT Samudra Logistik', 'bidang' => 'Logistik', 'alamat' => 'Jl. Perak Timur No. 8, Surabaya', 'telepon' => '031-3297745'],
            ['nama_perusahaan' => 'PT Hijau Lestari', 'bidang' => 'Agribisnis', 'alamat' => 'Jl. Gatot Subroto No. 77, Medan', 'telepon' => '061-4567321'],
            ['nama_perusahaan' => 'PT Kreasi Digital', 'bidang' => 'Media & Kreatif', 'alamat' => 'Jl. Malioboro No. 33, Yogyakarta', 'telepon' => '0274-512678'],
            ['nama_perusahaan' => 'PT Bangun Persada', 'bidang' => 'Konstruksi', 'alamat' => 'Jl. Pemuda No. 102, Semarang', 'telepon' => '024-3541987'],
            ['nama_perusahaan' => 'PT Sehat Sentosa', 'bidang' => 'Kesehatan', 'alamat' => 'Jl. Diponegoro No. 56, Denpasar', 'telepon' => '0361-225489'],
            ['nama_perusahaan' => 'PT Energi Cemerlang', 'bidang' => 'Energi', 'alamat' => 'Jl. Jend. Sudirman No. 9, Balikpapan', 'telepon' => '0542-736512'],
            ['nama_perusahaan' => 'CV Rasa Nusantara', 'bidang' => 'Kuliner', 'alamat' => 'Jl. Urip Sumoharjo No. 21, Makassar', 'telepon' => '0411-458213'],
        ];

        foreach ($data as $row) {
            Perusahaan::create($row);
        }
    }
}
