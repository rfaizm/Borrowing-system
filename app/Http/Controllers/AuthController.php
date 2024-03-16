<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function loginAdmin()
    {
        return view('admin.loginAdmin');
    }
    
    public function loginSiswa()
    {
        return view('user.userLogin');
    }

    public function prosesLoginAdmin(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/tampilHomePage');
        }
        Session::flash('statusFailAdmin', 'failed');
        Session::flash('message', 'Email / Password salah');
        return redirect('/loginAdmin');
    }
    
    public function prosesLoginSiswa(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/user');
        }
        Session::flash('statusFailSiswa', 'failed');
        Session::flash('message', 'Email / Password salah');
        return redirect('/loginSiswa');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginAdmin');
    }
    
    public function logoutSiswa(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginSiswa');
    }
}
