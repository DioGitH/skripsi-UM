<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karya;

class AdminController extends Controller
{
   public function index()
    {
        $totalUsers = User::count(); // Jumlah user / keanggotaan
        $totalKarya = Karya::count(); // Total karya
        $menungguVerifikasi = Karya::where('status', 'menunggu')->count(); // Karya dengan status "menunggu"
        $currentYear = now()->year;
        $years = range($currentYear - 2, $currentYear); // 3 tahun terakhir

        $guruData = [];
        $siswaData = [];

    foreach ($years as $year) {
    // Hitung karya untuk guru (profesi_id = 1)
    $guruData[] = Karya::whereYear('date', $year)
        ->whereHas('jenisKarya', function ($query) {
            $query->where('profesi_id', 1);
        })
        ->count();

    // Hitung karya untuk siswa (profesi_id = 2)
    $siswaData[] = Karya::whereYear('date', $year)
        ->whereHas('jenisKarya', function ($query) {
            $query->where('profesi_id', 2);
        })
        ->count();
}

        return view('admin.index', compact('totalUsers', 'totalKarya', 'menungguVerifikasi'),[
            'years' => $years,
            'guruData' => $guruData,
            'siswaData' => $siswaData,
            // data dashboard lainnya kalau ada
        ]);
    }
    public function bacaSemua(Request $request)
    {
        auth('admin')->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }
    
}
