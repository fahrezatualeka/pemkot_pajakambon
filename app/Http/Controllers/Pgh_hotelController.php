<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pgh_hotel;
use App\Models\Wp;
use App\Models\Pgh_hotelPelunasan;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Pgh_hotelController extends Controller
{
    public function index()
    {
        $data = Pgh_hotel::orderBy('tanggal', 'desc')->get();
        return view('penagihan/hotel/data', compact('data'));
    }
    
    // PENGECEKAN DATA HALAMAN
    public function create()
    {
        // Ambil data WP yang belum memiliki penagihan
        $existingNPWPDs = Pgh_hotel::pluck('npwpd')->toArray();
        $existingNPWPDs = Pgh_hotelPelunasan::pluck('npwpd')->toArray();
        
        $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'hotel')->get();
        $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'hotel')->get();
        
        return view('penagihan/hotel/add', compact('wpData'));
    }


    // PENGECEKAN DATA PELUNASAN
    // public function create()
    // {
    //     // Ambil data NPWPD yang sudah diproses dalam halaman pelunasan
    //     $existingNPWPDs = Pgh_hotelPelunasan::pluck('npwpd')->toArray();
        
    //     // Ambil data WP yang belum memiliki penagihan dan belum diproses dalam halaman pelunasan
    //     $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'hotel')->get();
        
    //     return view('penagihan/hotel/add', compact('wpData'));
    // }





    public function store(Request $request)
    {
        $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            // 'no_penagihan' => 'required',
            'no_telepon' => 'required',
            'tanggal' => 'required',
            'omset' => 'required',
            'pajak' => 'required',
        ]);

        // dd($request);
        // Set nilai default denda jika bidang diisi dan tidak kosong
        $denda = $request->filled('denda') ? $request->denda : 0;

        // Hitung total pajak
        $pajak = $request->omset * ($request->pajak / 100);

        // Hitung total keseluruhan
        $total = $pajak + $denda;

        // Simpan data beserta total ke database

        $data = Str::random(3);
        // Hash the string and convert to an integer
        $hash = crc32($data);
        Pgh_hotel::create([
            'id' => $hash,
            'npwpd' => $request->npwpd,
            'nama_pajak' => $request->nama_pajak,
            // 'no_penagihan' => $request->no_penagihan,
            'no_telepon' => $request->no_telepon,
            'tanggal' => $request->tanggal,
            'omset' => $request->omset,
            'pajak' => $request->pajak,
            'denda' => $denda,
            'total' => $total,
        ]);

        return redirect()->route('penagihan.hotel.data')->with('success', 'Data berhasil di Tambah');
    }

   public function edit($id)
    {
        $pgh_hotel = Pgh_hotel::findOrFail($id);
        return view('penagihan/hotel/edit', compact('pgh_hotel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npwpd' => 'required',
            'nama_pajak' => 'required',
            // 'no_penagihan' => 'required',
            'no_telepon' => 'required',
            'tanggal' => 'required',
            'omset' => 'required',
            'pajak' => 'required',
        ]);

        // Set nilai default denda jika bidang diisi dan tidak kosong
        $denda = $request->filled('denda') ? $request->denda : 0;

        // Hitung total pajak
        $pajak = $request->omset * ($request->pajak / 100);

        // Hitung total keseluruhan
        $total = $pajak + $denda;

        // Update data beserta total ke database
        $pgh_hotel = Pgh_hotel::findOrFail($id);
        $pgh_hotel->update([
            'npwpd' => $request->npwpd,
            'nama_pajak' => $request->nama_pajak,
            // 'no_penagihan' => $request->no_penagihan,
            'no_telepon' => $request->no_telepon,
            'tanggal' => $request->tanggal,
            'omset' => $request->omset,
            'pajak' => $request->pajak,
            'denda' => $denda,
            'total' => $total,
        ]);

        return redirect()->route('penagihan.hotel.data')->with('success', 'Data berhasil di Perbarui');
    }

    public function paymentSuccess($id)
    {
        $pgh_hotel = Pgh_hotel::findOrFail($id);

        // Pindahkan data ke tabel pelunasan dengan menambahkan tanggal saat ini
        Pgh_hotelPelunasan::create([
            'npwpd' => $pgh_hotel->npwpd,
            'nama_pajak' => $pgh_hotel->nama_pajak,
            // 'no_penagihan' => $pgh_hotel->no_penagihan,
            'no_telepon' => $pgh_hotel->no_telepon,
            'tanggal' => $pgh_hotel->tanggal,
            'tanggal_pelunasan' => Carbon::now()->toDateString(), // Tanggal pembayaran saat ini
            'omset' => $pgh_hotel->omset,
            'pajak' => $pgh_hotel->pajak,
            // 'denda' => $pgh_hotel->denda,
            'total' => $pgh_hotel->total,
        ]);

        // Hapus data dari tabel penagihan
        $pgh_hotel->delete();

        return redirect()->route('penagihan.hotel.data')->with('success', 'Data Penagihan berhasil di Bayarkan, data Pelunasan berada pada Data Pembayaran.');
    }

    
    public function destroy($id)
    {
        Pgh_hotel::findOrFail($id)->delete();
        return redirect()->route('penagihan.hotel.data')->with('success', 'Data berhasil di Hapus');
    }
    public function showPelunasan()
    {
        // $data = Pgh_hotelPelunasan::all();
        // dd($data); // Tambahkan ini untuk cek data
        $data = Pgh_hotelPelunasan::orderBy('tanggal', 'desc')->get();
        return view('penagihan.hotel.pelunasan', compact('data'));
    }
    
    public function deletePelunasan($id)
    {
        $pgh_hotelPelunasan = Pgh_hotelPelunasan::findOrFail($id);
        $pgh_hotelPelunasan->delete();
        return redirect()->route('penagihan.hotel.pelunasan')->with('success', 'Data Pelunasan berhasil dihapus');
    }   
}