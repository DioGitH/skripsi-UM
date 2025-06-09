<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Karya;


class ActivityController extends Controller
{
    public function index(){
    $user = Auth::user(); // Ambil user login
    $currentYear = now()->year;

    // Ambil hanya 3 tahun terakhir dan hanya karya milik user login
    $yearlyData = DB::table('karyas')
        ->selectRaw('YEAR(date) as year, COUNT(*) as total')
        ->where('user_id', $user->id) // ✅ Tambahkan filter berdasarkan user login
        ->whereBetween(DB::raw('YEAR(date)'), [$currentYear - 2, $currentYear])
        ->groupByRaw('YEAR(date)')
        ->orderBy('year')
        ->pluck('total', 'year');

    $years = $yearlyData->keys();       // Contoh: [2023, 2024, 2025]
    $totals = $yearlyData->values();    // Contoh: [5, 12, 7]

    return view('activity.index', [
        'years' => $years,
        'totals' => $totals,
    ]);
}

   public function activitylist()
    {
    $user = Auth::user();

    // Ambil semua karya milik user login
    $karyas = Karya::where('user_id', $user->id)->get();

    return view('activity.activitylist', compact('karyas'));
}
public function destroy($id)
{
    $karya = Karya::findOrFail($id);

    // Optional: pastikan hanya pemilik yang bisa menghapus
    if ($karya->user_id != Auth::id()) {
        abort(403);
    }

    $karya->delete();

    return redirect()->back()->with('success', 'Karya berhasil dihapus.');
}

}
