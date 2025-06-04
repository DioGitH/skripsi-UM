<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKarya;

class DataKaryaController extends Controller
{
    public function index(){
        return view('admin.data');
    }
      public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('jenis_karya_foto', 'public');
        }

        JenisKarya::create([
            'nama' => $request->nama,
            'foto_path' => $fotoPath,
        ]);

        return redirect()->route('data.create')->with('success', 'Jenis karya berhasil disimpan.');
    }
}
