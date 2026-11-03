<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index(Request $request)
    {
        $perusahaan = Perusahaan::orderBy('id', 'desc')->get();

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($perusahaan);
        }

        return view('tesreact');
    }

    public function create()
    {
        return view('tesreact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
        ]);

        $perusahaan = Perusahaan::create($validatedData);

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json(['message' => 'Data berhasil ditambahkan!', 'data' => $perusahaan], 201);
        }

        return redirect()->route('dataperusahaan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($perusahaan);
        }

        return view('tesreact');
    }

    public function edit($id)
    {
        return view('tesreact');
    }   

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update($validatedData);

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json(['message' => 'Data berhasil diupdate!', 'data' => $perusahaan]);
        }

        return redirect()->route('dataperusahaan.index')->with('success', 'Data berhasil diupdate!');
    }
    
// fungsi destroy untuk menghapus data
    public function destroy(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json(['message' => 'Data berhasil dihapus!']);
        }

        return redirect()->route('dataperusahaan.index')->with('success', 'Data berhasil dihapus!');
    }
}
