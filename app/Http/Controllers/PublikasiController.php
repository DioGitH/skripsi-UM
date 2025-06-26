<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karya;

class PublikasiController extends Controller
{
    public function index(Request $request)
{
    $query = Karya::query()
        ->with('jenisKarya') // agar bisa akses jenisKarya di blade
        ->where('status', 'Terpublish');

    // Filter berdasarkan profesi_id dari jenis_karyas
    if ($request->kategori) {
        $query->whereHas('jenisKarya', function ($q) use ($request) {
            $q->where('profesi_id', $request->kategori); // 1=guru, 2=siswa
        });
    }

    // Filter pencarian judul atau kreator
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

    return view('admin.publikasi', compact('karyas'));
}

        public function bacaSemua(Request $request)
    {
        auth('admin')->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }
}
