<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
     public function index(){
        return view('session.index');
    }

    public function register(){
        return view('session.register');
    }

    public function regisStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'profesi' => 'required|in:guru,siswa',
            'mata_pelajaran' => 'nullable|string|max:100',
            'kelas' => 'nullable|in:10,11,12',
            'jurusan' => 'nullable|string|max:100',
            'captcha' => 'required|captcha'

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profesi' => $request->profesi,
            'mata_pelajaran' => $request->profesi === 'guru' ? $request->mata_pelajaran : null,
            'kelas' => $request->profesi === 'siswa' ? $request->kelas : null,
            'jurusan' => $request->profesi === 'siswa' ? $request->jurusan : null,
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
