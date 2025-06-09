<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKarya;
use App\Models\Karya;


class KaryaMasukController extends Controller
{
    public function index(){
    $jenisKarya = JenisKarya::all(); // Ambil semua jenis karya
    return view('admin.karya', compact('jenisKarya'));
    }
public function preview($id, Request $request)
{
    $jenisKarya = JenisKarya::findOrFail($id);

    $query = Karya::where('jenis_karya_id', $jenisKarya->id)->with('user');

    if ($request->filled('kategori')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('profesi', $request->kategori);
        });
    }

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('creator', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('tanggal')) {
        $query->whereDate('created_at', $request->tanggal);
    }

    $karyas = $query->latest()->get();

    return view('admin.karya_preview', compact('jenisKarya', 'karyas'));
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
