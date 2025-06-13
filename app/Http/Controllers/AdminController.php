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
            // Hitung karya untuk guru
            $guruData[] = Karya::whereYear('date', $year)
                ->whereHas('user', function ($query) {
                    $query->where('profesi', 'guru'); // pastikan kolom role = 'guru'
                })
                ->count();

            // Hitung karya untuk siswa
            $siswaData[] = Karya::whereYear('date', $year)
                ->whereHas('user', function ($query) {
                    $query->where('profesi', 'siswa'); // pastikan kolom role = 'siswa'
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
