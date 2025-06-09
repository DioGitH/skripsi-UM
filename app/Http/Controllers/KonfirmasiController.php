<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya;

class KonfirmasiController extends Controller
{
    public function index(Request $request)
    {
    $query = Karya::query()->where('status', 'menunggu');

    if ($request->kategori) {
        $query->where('type', $request->kategori); // pastikan field 'type' menyimpan 'siswa' atau 'guru'
    }

    if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('creator', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->tanggal) {
        $query->whereDate('date', $request->tanggal);
    }

    $karyas = $query->get();

    return view('admin.konfirmasi', compact('karyas'));
    }
    public function show($id)
    {
        $karya = Karya::with(['user', 'files'])->findOrFail($id); // Tambahkan 'files'
        return view('admin.pratinjau', compact('karya'));
    }

public function publish($id)
{
    $karya = Karya::findOrFail($id);
    $karya->status = 'Terpublish';
    $karya->save();

    return redirect()->route('konfirmasi')->with('success', 'Karya berhasil dipublikasikan.');
}
public function arsip($id)
{
    $karya = Karya::findOrFail($id);
    $karya->status = 'Arsip';
    $karya->save();

    return redirect()->route('konfirmasi')->with('success', 'Karya berhasil dipublikasikan.');
}
}
