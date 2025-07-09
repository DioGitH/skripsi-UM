<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKarya;
use App\Models\Karya;
use App\Models\Setting;


class KaryaMasukController extends Controller
{
    public function index(Request $request)
    {
        $query = JenisKarya::with('profesi');

        // Mapping teks ke ID
        $profesiMap = [
            'guru' => 1,
            'siswa' => 2,
        ];

        if ($request->filled('profesi') && isset($profesiMap[$request->profesi])) {
            $query->where('profesi_id', $profesiMap[$request->profesi]);
        }

        $jenisKarya = $query->get();
        $showGuru = Setting::where('key', 'show_jelajahi_guru')->value('value');
        $showSiswa = Setting::where('key', 'show_jelajahi_siswa')->value('value');

        return view('admin.karya', compact('jenisKarya', 'showGuru', 'showSiswa'));
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

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('jenis_karya_foto', 'public');
        }
        JenisKarya::create([
            'nama' => $request->nama,
            'foto_path' => $fotoPath,
            'profesi_id' => $request->profesi_id, // simpan profesinya
        ]);

        return redirect()->back()->with('success', 'Jenis Karya berhasil ditambahkan');
    }
    public function bacaSemua(Request $request)
    {
        auth('admin')->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }
    public function update(Request $request)
    {
        Setting::updateOrCreate(['key' => 'show_jelajahi_guru'], ['value' => $request->has('show_guru') ? '1' : '0']);
        Setting::updateOrCreate(['key' => 'show_jelajahi_siswa'], ['value' => $request->has('show_siswa') ? '1' : '0']);

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan.');
    }

}
