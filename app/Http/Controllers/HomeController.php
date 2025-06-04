<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKarya;
use App\Models\Karya;
use Illuminate\Support\Facades\Storage;




class HomeController extends Controller
{
    public function index(){

         $jenisKaryas = JenisKarya::all();
        return view('welcome', compact('jenisKaryas'));
    }
    public function create($jenisKarya)
    {
        $jenisKarya = JenisKarya::where('nama', $jenisKarya)->firstOrFail();
        return view('form', compact('jenisKarya'));
    }
        public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'creator' => 'required',
            'source' => 'nullable',
            'date' => 'required|date',
            'contribution' => 'nullable',
            'rights' => 'nullable',
            'relation' => 'nullable',
            'format' => 'required',
            'identifier' => 'nullable',
            'coverage' => 'nullable',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png,mp4|max:20480',
            'jenis_karya_id' => 'required|exists:jenis_karyas,id',
        ]);

        $path = $request->file('file')->store('karya_files');

        Karya::create([
            'user_id' => auth()->id(),
            'jenis_karya_id' => $validated['jenis_karya_id'],
            'title' => $validated['title'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'creator' => $validated['creator'],
            'source' => $validated['source'],
            'date' => $validated['date'],
            'contribution' => $validated['contribution'],
            'rights' => $validated['rights'],
            'relation' => $validated['relation'],
            'format' => $validated['format'],
            'identifier' => $validated['identifier'],
            'coverage' => $validated['coverage'],
            'file_path' => $path,
        ]);

        return redirect()->route('karya.unggah')->with('success', 'Karya berhasil diunggah.');
    }

}
