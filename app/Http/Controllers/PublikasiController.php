<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya;

class PublikasiController extends Controller
{
     public function index(Request $request)
    {
    $query = Karya::query()->where('status', 'Terpublish');

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

    return view('admin.publikasi', compact('karyas'));
    }
}
