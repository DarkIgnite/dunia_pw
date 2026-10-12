<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('dataperusahaan', compact('perusahaan'));
    }

    public function create()
    {
        return view('pageinputdata');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
        ]);
        Perusahaan::create($validatedData);
        return redirect()->route('dataperusahaan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Perusahaan $perusahaan)
    {
        return view('dataperusahaan.edit', compact('perusahaan'));
    }   

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
        ]);
        $perusahaan->update($validatedData);
        return redirect()->route('dataperusahaan.index')->with('success', 'Data berhasil diupdate!');
    }
    
// fungsi destroy untuk menghapus data
    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('dataperusahaan.index')->with('success', 'Data berhasil dihapus!');
    }
}
