<?php

namespace App\Http\Controllers;
use App\Models\JenisKarya;
use App\Models\Karya;
use App\Models\User;

use Illuminate\Http\Request;

class KaryaController extends Controller
{
public function showJenis($profesi)
{
    $jenisKaryas = JenisKarya::all(); // atau bisa difilter berdasarkan profesi kalau sudah disimpan

    return view('jelajahi.jenis', compact('jenisKaryas', 'profesi'));
}
public function show($id)
{
    $karya = Karya::with(['files','jenisKarya'])->findOrFail($id);
    return view('karya.index', compact('karya'));
}


    public function filterKarya($profesi, $jenisKarya, Request $request)
    {
        $query = $request->input('query');
        $startsWith = $request->input('starts_with');

        $karyas = Karya::whereHas('jenisKarya', function ($q) use ($jenisKarya) {
            $q->where('nama', $jenisKarya);
        })
        ->whereHas('user.profesi', function ($q) use ($profesi) {
            $q->where('nama', $profesi);
        });

        if ($query) {
            $karyas = $karyas->where(function ($q) use ($query) {
                $q->where('title', 'like', "%$query%")
                ->orWhere('creator', 'like', "%$query%")
                ->orWhere('subject', 'like', "%$query%");
            });
        }

        if ($startsWith) {
            $karyas = $karyas->where('title', 'like', $startsWith . '%');
        }

        $karyas = $karyas->latest()->paginate(5)->withQueryString();

        return view('jelajahi.karya', compact('karyas', 'profesi', 'jenisKarya'));
    }

}
