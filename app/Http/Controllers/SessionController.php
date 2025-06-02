<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
     public function index(){
        return view('session.index');
    }

    public function register(){
        return view('session.register');
    }

    public function login(Request $request){
        Session::flash('nip', $request->nip);
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ], [
            'nip.required' => "NIP harus diisi",
            'password.required' => "Password harus diisi",
        ]);

        $infologin = [
            'nip' => $request->nip,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/')->with('success', 'Berhasil Login');
        } else {
            return redirect('login')->with('error', 'NIP atau Password salah');
        }
    }

     public function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil Logout');
    }
}
