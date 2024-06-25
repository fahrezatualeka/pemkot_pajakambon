<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prs_restoran;

class Prs_restoranController extends Controller
{
    public function index()
    {
        $data = Prs_restoran::all();
        return view('pemeriksaan/restoran/data', compact('data'));
    }

    public function create(){
        return view('pemeriksaan/restoran/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npwpd' => 'required',
            'nama_wajib_pajak' => 'required',
            'no_pemeriksaan' => 'required',
            'tanggal' => 'required'
        ]);

        // Simpan data beserta nama file gambar ke database
        Prs_restoran::create([
            'npwpd' => $request->npwpd,
            'nama_wajib_pajak' => $request->nama_wajib_pajak,
            'no_pemeriksaan' => $request->no_pemeriksaan,
            'tanggal' => $request->tanggal
        ]);

        return redirect()->route('pemeriksaan.restoran.data')->with('success', 'Data berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $prs_restoran = prs_restoran::findOrFail($id);
        return view('pemeriksaan/restoran/edit', compact('prs_restoran'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_wajib_pajak' => 'required',
            'no_pemeriksaan' => 'required',
            'tanggal' => 'required'
        ]);
        
        $prs_restoran = Prs_restoran::findOrFail($id);
        $prs_restoran->update($data);
        
        return redirect()->route('pemeriksaan.restoran.data')->with('success', 'Data berhasil di Perbarui');
    }

    public function destroy($id)
    {
        Prs_restoran::findOrFail($id)->delete();
        return redirect()->route('pemeriksaan.restoran.data')->with('success', 'Data berhasil di Hapus');
    }
}