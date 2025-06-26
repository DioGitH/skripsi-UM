<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya;

class KonfirmasiController extends Controller
{
public function index(Request $request)
{
    $query = Karya::query()->with('jenisKarya')->where('status', 'menunggu');

    // Filter berdasarkan profesi_id dari jenis_karyas
    if ($request->kategori) {
        $query->whereHas('jenisKarya', function ($q) use ($request) {
            $q->where('profesi_id', $request->kategori); // 1=guru, 2=siswa
        });
    }

    // Filter pencarian
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('creator', 'like', '%' . $request->search . '%');
        });
    }

    // Filter tanggal
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
public function indexArsip(Request $request)
{
    $query = Karya::query()
        ->with('jenisKarya')
        ->where('status', 'Arsip');

    // Filter berdasarkan profesi_id dari relasi jenis_karya
    if ($request->kategori) {
        $query->whereHas('jenisKarya', function ($q) use ($request) {
            $q->where('profesi_id', $request->kategori); // 1 = Guru, 2 = Siswa
        });
    }

    // Filter pencarian
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('creator', 'like', '%' . $request->search . '%');
        });
    }

    // Filter tanggal
    if ($request->tanggal) {
        $query->whereDate('date', $request->tanggal);
    }

    $karyas = $query->get();

    return view('admin.arsip', compact('karyas'));
}

    public function bacaSemua(Request $request)
    {
        auth('admin')->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }
}
