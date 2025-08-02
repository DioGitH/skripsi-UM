<?php

namespace App\Http\Controllers;

use App\Models\JenisKarya;
use App\Models\Karya;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    public function showJenis($profesi)
    {
        $jenisKaryas = JenisKarya::all(); // atau bisa difilter berdasarkan profesi kalau sudah disimpan

        return view('jelajahi.jenis', compact('jenisKaryas', 'profesi'));
    }
    public function show($id)
    {
        $karya = Karya::with(['files', 'jenisKarya'])->findOrFail($id);
        return view('karya.index', compact('karya'));
    }

    public function edit($id)
    {
        $karya = Karya::with(['files', 'jenisKarya'])->findOrFail($id);
        return view('karya.edit', compact('karya'));
    }

    public function update($id, Request $request)
    {
        $karya = Karya::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'creator' => 'required|string|max:255',
            'source' => 'nullable|string|max:255',
            'publisher' => 'required|string|max:255',
            'date' => 'required|date',
            'contributor' => 'required|string|max:255',
            'rights' => 'required|in:Semua,Arsip',
            'relation' => 'nullable|string|max:255',
            'language' => 'required|string|max:255',
            'identifier' => 'required|string|max:255',
            'coverage' => 'nullable|string|max:255',
            'format.*' => 'required|string|in:pdf,jpg,mp4',
            'file.*' => 'nullable|file|max:51200', // max 50MB
        ]);

        // Default file_path dan format (jika tidak upload baru)
        $filePath = $karya->file_path;
        $format = $karya->format;

        // Jika ada file baru di-upload
        if ($request->hasFile('file')) {
            // Ambil file pertama
            $uploadedFile = $request->file('file')[0];
            $formatInput = $request->format[0];

            // Simpan file baru
            $path = $uploadedFile->store('karya_files', 'public');

            // Hapus file lama jika ada
            if ($karya->file_path && Storage::disk('public')->exists($karya->file_path)) {
                Storage::disk('public')->delete($karya->file_path);
            }

            $filePath = $path;
            $format = $formatInput;
        }

        // Update data ke database
        $karya->update([
            'title' => $request->title,
            'subject' => $request->subject,
            'description' => $request->description,
            'creator' => $request->creator,
            'source' => $request->source,
            'publisher' => $request->publisher,
            'date' => $request->date,
            'contributor' => $request->contributor,
            'rights' => $request->rights,
            'relation' => $request->relation,
            'language' => $request->language,
            'identifier' => $request->identifier,
            'coverage' => $request->coverage,
            'file_path' => $filePath,
            'keteranganStatus' => 'Sudah Mengirim Revisi'
        ]);

        return redirect()->back()->with('success', 'Karya berhasil diperbarui.');
    }


    public function filterKarya($profesi, $jenisKarya, Request $request)
    {
        $query = $request->input('query');
        $startsWith = $request->input('starts_with');

        $karyas = Karya::where('status', 'Terpublish')->whereHas('jenisKarya', function ($q) use ($jenisKarya) {
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
