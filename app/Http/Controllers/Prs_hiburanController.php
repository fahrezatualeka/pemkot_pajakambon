<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prs_hiburan;

class Prs_hiburanController extends Controller
{
    public function index()
    {
        $data = Prs_hiburan::all();
        return view('pemeriksaan/hiburan/data', compact('data'));
    }

    public function create(){
        return view('pemeriksaan/hiburan/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npwpd' => 'required',
            'nama_wajib_pajak' => 'required',
            'no_pemeriksaan' => 'required',
            'tanggal' => 'required',
        ]);

        // Simpan data beserta nama file gambar ke database
        Prs_hiburan::create([
            'npwpd' => $request->npwpd,
            'nama_wajib_pajak' => $request->nama_wajib_pajak,
            'no_pemeriksaan' => $request->no_pemeriksaan,
            'tanggal' => $request->tanggal
        ]);

        return redirect()->route('pemeriksaan.hiburan.data')->with('success', 'Data berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $prs_hiburan = prs_hiburan::findOrFail($id);
        return view('pemeriksaan/hiburan/edit', compact('prs_hiburan'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_wajib_pajak' => 'required',
            'no_pemeriksaan' => 'required',
            'tanggal' => 'required'
        ]);
        
        $prs_hiburan = Prs_hiburan::findOrFail($id);
        $prs_hiburan->update($data);
        
        return redirect()->route('pemeriksaan.hiburan.data')->with('success', 'Data berhasil di Perbarui');
    }

    public function destroy($id)
    {
        Prs_hiburan::findOrFail($id)->delete();
        return redirect()->route('pemeriksaan.hiburan.data')->with('success', 'Data berhasil di Hapus');
    }
}