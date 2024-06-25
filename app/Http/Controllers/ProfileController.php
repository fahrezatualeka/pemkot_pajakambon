<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|unique:users,username,' . auth()->user()->id,
            'password' => 'nullable|min:5|confirmed',
            'no_telepon' => 'required|string',
            'alamat' => 'required|string',
            'kode' => 'required|string',
        ], [
            'password.min' => 'Password minimal terdiri dari 5 karakter.'
        ]);
    
        // Ambil pengguna yang sedang login
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->no_telepon = $request->no_telepon;
        $user->alamat = $request->alamat;
        $user->kode = $request->kode;
    
        // Periksa apakah password disediakan
        if ($request->password) {
            // Enkripsi dan tetapkan password jika disediakan
            $user->password = bcrypt($request->password);
        }
    
        // Simpan perubahan
        $user->save();
    
        // Logika untuk mengarahkan pengguna kembali ke halaman profil setelah berhasil memperbarui profil
        return redirect('/login')->with('success', 'Profil Anda berhasil diperbarui.');
    }    

    public function destroy(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Hapus profil pengguna yang sedang login
        $user->delete();

        // Sesudah berhasil menghapus, arahkan pengguna ke halaman pendaftaran
        return redirect('/register')->with('success', 'Profil Anda berhasil di Hapus, silahkan Daftar kembali.');
    }
}