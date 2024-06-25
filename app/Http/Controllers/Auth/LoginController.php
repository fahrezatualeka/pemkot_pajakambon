<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        // Konversi username menjadi huruf kecil sebelum melakukan autentikasi
        $credentials['username'] = strtolower($credentials['username']);
    
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Selamat Datang di Website Monitoring Pengelolaan Pajak Pemerintah Kota Ambon');
        } else{
            return redirect('/login')->with('error', 'Akun yang Anda masukkan tidak Terdaftar');
        }
    
        // Jika pengguna dengan username dalam huruf kecil tidak ditemukan, kembalikan pesan kesalahan
        if (!User::whereRaw('LOWER(username) = ?', [$credentials['username']])->exists()) {
            Session::flash('Error', 'Username yang Anda masukkan Salah.');
        } else {
            // Jika pengguna dengan username dalam huruf kecil ditemukan tetapi password salah, kembalikan pesan kesalahan
            Session::flash('Error', 'Password yang Anda masukkan Salah.');
        }
    
        return redirect()->back();
    }
}