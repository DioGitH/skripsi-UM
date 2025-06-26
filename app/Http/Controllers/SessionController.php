<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Profesi;
use App\Models\JenisKarya;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class SessionController extends Controller
{
     public function index(){
        return view('session.index');
    }

    public function register(){
        $profesis = Profesi::all(); // Ambil semua profesi dari tabel
        return view('session.register',  compact('profesis'));
    }

    public function regisStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'profesi_id' => 'required|exists:profesis,id',
            'mata_pelajaran' => 'nullable|string|max:100',
            'kelas' => 'nullable|in:10,11,12',
            'jurusan' => 'nullable|string|max:100',
            'g-recaptcha-response' => 'required',
        ]);

        // Verifikasi reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);
        $body = $response->json();

        if (!$body['success']) {
            return back()->withErrors(['captcha' => 'Captcha tidak valid'])->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profesi_id' => $request->profesi_id,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('login')->with('success', 'Pendaftaran berhasil!');
    }


public function login(Request $request)
{
    $request->validate([
        'name' => 'required',
        'password' => 'required',
    ], [
        'name.required' => "Username harus diisi",
        'password.required' => "Password harus diisi",
    ]);

    $credentials = $request->only('name', 'password');

    // Coba login sebagai admin dulu
    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect('/admin')->with('success', 'Login sebagai Admin berhasil');
    }

    // Jika gagal, coba login sebagai user
    if (Auth::guard('web')->attempt($credentials)) {
        return redirect('/')->with('success', 'Login sebagai User berhasil');
    }

    // Jika gagal dua-duanya
    return redirect('login')
        ->withErrors(['login' => 'Username atau Password salah'])
        ->withInput();
}
     public function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil Logout');
    }
}
