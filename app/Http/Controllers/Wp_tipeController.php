<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wp_tipe;

class Wp_tipeController extends Controller
{
    public function index()
    {
        $data = Wp_tipe::all();
        return view('wp_tipe/data', compact('data'));
    }

    public function create()
    {
        return view('wp_tipe/add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            'jenis' => 'required|in:hiburan,hotel,restoran',
            'tarif' => 'required'
        ]);

        Wp_tipe::create($data);

        // Redirect kembali ke halaman index dengan data yang telah ditambahkan
        return redirect()->route('wp_tipe.data')->with('success', 'Data berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $wp_tipe = Wp_tipe::findOrFail($id);
        return view('wp_tipe/edit', compact('wp_tipe'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            'jenis' => 'required|in:hiburan,hotel,restoran',
            'tarif' => 'required'
        ]);
        
        $wp_tipe = Wp_tipe::findOrFail($id);
        $wp_tipe->update($data);
        
        return redirect()->route('wp_tipe.data')->with('success', 'Data berhasil di Perbarui');
    }
    
    public function destroy($id)
    {
        Wp_tipe::findOrFail($id)->delete();
        return redirect()->route('wp_tipe.data')->with('success', 'Data berhasil di Hapus');
    }
}