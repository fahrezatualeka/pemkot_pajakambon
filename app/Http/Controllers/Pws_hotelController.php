<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pws_hotel;

class Pws_hotelController extends Controller
{
    public function index()
    {
        $data = Pws_hotel::all();
        return view('pengawasan/hotel/data', compact('data'));
    }

    public function create(){
        return view('pengawasan/hotel/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            'no_pengawasan' => 'required',
            'tanggal' => 'required',
            'sspd' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'sptpd' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Simpan gambar sspd
        $sspdPath = $request->file('sspd')->store('public/images');
        $sspdPath = str_replace('public/', '', $sspdPath); // Ubah path agar sesuai untuk penyimpanan di database

        // Simpan gambar sptpd
        $sptpdPath = $request->file('sptpd')->store('public/images');
        $sptpdPath = str_replace('public/', '', $sptpdPath); // Ubah path agar sesuai untuk penyimpanan di database

        // Simpan data beserta nama file gambar ke database
        Pws_hotel::create([
            'npwpd' => $request->npwpd,
            'nama_pajak' => $request->nama_pajak,
            'no_pengawasan' => $request->no_pengawasan,
            'tanggal' => $request->tanggal,
            'sspd_path' => $sspdPath,
            'sptpd_path' => $sptpdPath,
        ]);

        return redirect()->route('pengawasan.hotel.data')->with('success', 'Data berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $pws_hotel = pws_hotel::findOrFail($id);
        return view('pengawasan/hotel/edit', compact('pws_hotel'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            'no_pengawasan' => 'required',
            'tanggal' => 'required',
            'sspd_path' => 'required',
            'sptpd_path' => 'required'
        ]);
        
        $pws_hotel = Pws_hotel::findOrFail($id);
        $pws_hotel->update($data);
        
        return redirect()->route('pengawasan.hotel.data')->with('success', 'Data berhasil di Perbarui');
    }

    public function destroy($id)
    {
        Pws_hotel::findOrFail($id)->delete();
        return redirect()->route('pengawasan.hotel.data')->with('success', 'Data berhasil di Hapus');
    }
}