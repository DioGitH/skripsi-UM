<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKarya;
use App\Models\Admin;
use App\Models\Karya;
use App\Notifications\KaryaBaruNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
public function index()
{
    $user = Auth::user();

    // Ambil jenis karya yang sesuai profesi user
    $jenisKaryas = JenisKarya::where('profesi_id', $user->profesi_id)->get();

    $karyaTerbaru = Karya::with('files')
        ->where('status', 'Terpublish')
        ->latest()
        ->take(15)
        ->get();

    return view('welcome', compact('jenisKaryas', 'karyaTerbaru', 'user'));
}


    public function create($jenisKarya)
    {
        $jenisKarya = JenisKarya::with('profesi')->where('nama', $jenisKarya)->firstOrFail();
        $user = Auth::user();
        return view('form', compact('jenisKarya', 'user'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'creator' => 'required',
            'publisher' => 'required',
            'language' => 'required',
            'source' => 'nullable',
            'date' => 'required|date',
            'contributor' => 'nullable',
            'rights' => 'nullable',
            'relation' => 'nullable',
            'identifier' => 'nullable',
            'coverage' => 'nullable',
            'jenis_karya_id' => 'required|exists:jenis_karyas,id',
            'format' => 'required|array',
            'format.*' => 'in:pdf,jpg,jpeg,png,mp4',
            'file' => 'required|array',
            'file.*' => 'file|mimes:pdf,jpg,jpeg,png,mp4|max:51200', // 50MB
        ]);
        \Log::info('Validasi berhasil:', $validated);


        // Simpan data utama karya
        $karya = Karya::create([
            'user_id' => auth()->id(),
            'jenis_karya_id' => $validated['jenis_karya_id'],
            'title' => $validated['title'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'creator' => $validated['creator'],
            'publisher' => $validated['publisher'],
            'language' => $validated['language'],
            'source' => $validated['source'],
            'date' => $validated['date'],
            'contributor' => $validated['contributor'],
            'rights' => $validated['rights'],
            'relation' => $validated['relation'],
            'identifier' => $validated['identifier'],
            'coverage' => $validated['coverage'],
            'status' => 'Menunggu',
        ]);

        // Simpan masing-masing file
        $files = $request->file('file');
        $formats = $validated['format'];

        foreach ($files as $index => $file) {
            $path = $file->store('karya_files', 'public');
            $karya->files()->create([
                'file_path' => $path,
                'format' => $formats[$index] ?? $file->getClientOriginalExtension(),
                'size' => $file->getSize(),
            ]);
        }
        \Log::info('Menyimpan file:', [
            'path' => $path,
            'format' => $formats[$index] ?? $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
        ]);
        \Log::info('Data Karya Tersimpan:', $karya->toArray());


        $jenisKarya = JenisKarya::find($validated['jenis_karya_id']);

        // Kirim notifikasi hanya ke admin
       $adminUsers = Admin::all();
        foreach ($adminUsers as $admin) {
            $admin->notify(new KaryaBaruNotification($karya));
        }
        \Log::info('Notifikasi dikirim ke admin', ['admin_id' => $admin->id]);
        return redirect()->route('karya.create', ['jenisKarya' => $jenisKarya->nama])
            ->with('success', 'Karya berhasil diunggah.');
    }
    public function getJenisByProfesi($id)
    {
        $jenisKaryas = JenisKarya::where('profesi_id', $id)->get();

        return response()->json($jenisKaryas);
    }
    public function jenisByType($type)
    {
        $jenisKaryas = JenisKarya::where('type', $type)->get();
        $types = Karya::select('type')->distinct()->pluck('type'); // ambil semua type unik

        return view('jenikarya', compact('jenisKaryas', 'type', 'types'));
    }



}
