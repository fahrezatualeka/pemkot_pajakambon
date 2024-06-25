<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prs_hotel;

class Prs_hotelController extends Controller
{
    public function index()
    {
        $data = Prs_hotel::all();
        return view('pemeriksaan/hotel/data', compact('data'));
    }

    public function create(){
        return view('pemeriksaan/hotel/add');
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
        Prs_hotel::create([
            'npwpd' => $request->npwpd,
            'nama_wajib_pajak' => $request->nama_wajib_pajak,
            'no_pemeriksaan' => $request->no_pemeriksaan,
            'tanggal' => $request->tanggal
        ]);

        return redirect()->route('pemeriksaan.hotel.data')->with('success', 'Data berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $prs_hotel = prs_hotel::findOrFail($id);
        return view('pemeriksaan/hotel/edit', compact('prs_hotel'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_wajib_pajak' => 'required',
            'no_pemeriksaan' => 'required',
            'tanggal' => 'required'
        ]);
        
        $prs_hotel = Prs_hotel::findOrFail($id);
        $prs_hotel->update($data);
        
        return redirect()->route('pemeriksaan.hotel.data')->with('success', 'Data berhasil di Perbarui');
    }

    public function destroy($id)
    {
        Prs_hotel::findOrFail($id)->delete();
        return redirect()->route('pemeriksaan.hotel.data')->with('success', 'Data berhasil di Hapus');
    }
}