<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Http\Request;

class SessionAdminController extends Controller
{
    function index(){
        return view('admin.login');
    }
    function store(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        \Log::info('Trying to log in with credentials:', $credentials);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admin')->with('success', 'Login successful');
        }

        return redirect('admin/login')->with('error', 'Login details are not valid');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login')->with('success', 'Logged out successfully');
    }
}
