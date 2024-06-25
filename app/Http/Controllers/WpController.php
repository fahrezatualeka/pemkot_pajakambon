<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wp;
use App\Models\Pgh_hiburan;
use App\Models\Pgh_hotel;
use App\Models\Pgh_restoran;

class WpController extends Controller
{
    // public function formIndex()
    // {
    //     $data = Wp::all();
    //     return view('wp/form', compact('data'));
    // }

    // public function formCreate()
    // {
    //     return view('wp/form/add');
    // }
    
    // public function formStore(Request $request)
    // {
    //     $data = $request->validate([
    //         'npwpd' => 'required',
    //         'nama_pajak' => 'required',
    //         'jenis' => 'required|in:hiburan,hotel,restoran',
    //         'nama_kelola' => 'required',
    //         'username' => 'required',
    //         'no_telepon' => 'required',
    //         'alamat' => 'required'
    //     ]);
        
    //     Wp::create($data);
        
    //     // Redirect kembali ke halaman index dengan data yang telah ditambahkan
    //     return redirect()->route('wp.formSuccess');
    // }
    public function index()
    {
        $data = Wp::all();
        return view('wp.data', compact('data'));
    }

    public function create()
    {
        return view('wp.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            'nama_kelola' => 'required',
            'jenis' => 'required|in:hiburan,hotel,restoran',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'omset' => 'required|numeric',
            'pajak' => 'required|numeric',
            'sptpd' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048'
        ]);
    
        // Simpan file SPTPD
        if ($request->hasFile('sptpd')) {
            $file = $request->file('sptpd');
            $filePath = $file->store('uploads', 'public');
            $data['sptpd'] = $filePath;
        }
    
        Wp::create($data);
    
        return redirect()->route('wp.formSuccess')->with('success', 'Data berhasil ditambahkan!');
    }    

    public function formSuccess()
    {
        return view('wp.formSuccess');
    }

    public function edit($id)
    {
        $wp = Wp::findOrFail($id);
        return view('wp.edit', compact('wp'));
    }
    
    public function update(Request $request)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            'nama_kelola' => 'required',
            'jenis' => 'required|in:hiburan,hotel,restoran',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'omset' => 'required|numeric',
            'pajak' => 'required|numeric',
            'sptpd' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|damax:2048'
        ]);
    
        // Simpan file SPTPD
        if ($request->hasFile('sptpd')) {
            $file = $request->file('sptpd');
            $filePath = $file->store('uploads', 'public');
            $data['sptpd'] = $filePath;
        }
    
        Wp::create($data);
    
        return redirect()->route('wp.data')->with('success', 'Data berhasil diubah!');
    }    
    
    

    public function search(Request $request)
    {
        $npwpd = $request->query('npwpd');
        $wp = Wp::where('npwpd', $npwpd)->first();

        if ($wp) {
            return response()->json($wp);
        } else {
            return response()->json(null, 404); // Kembalikan status 404 jika tidak ditemukan
        }
    }
    
    
    public function destroy($id)
    {
        // Cari data WP yang akan dihapus
        $wp = Wp::findOrFail($id);
        
        // Hapus semua data penagihan yang terkait dengan WP ini
        Pgh_hiburan::where('npwpd', $wp->npwpd)->delete();
        Pgh_hotel::where('npwpd', $wp->npwpd)->delete();
        Pgh_restoran::where('npwpd', $wp->npwpd)->delete();

        // Hapus data WP
        $wp->delete();

        return redirect()->route('wp.data')->with('success', 'Data berhasil di Hapus');
    }

}