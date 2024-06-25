<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pgh_restoran;
use App\Models\Wp;
use App\Models\Pgh_restoranPelunasan;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Pgh_restoranController extends Controller
{
    public function index()
    {
        $data = Pgh_restoran::orderBy('tanggal', 'desc')->get();
        return view('penagihan/restoran/data', compact('data'));
    }
    
    // PENGECEKAN DATA HALAMAN
    public function create()
    {
        // Ambil data WP yang belum memiliki penagihan
        $existingNPWPDs = Pgh_restoran::pluck('npwpd')->toArray();
        $existingNPWPDs = Pgh_restoranPelunasan::pluck('npwpd')->toArray();
        
        $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'restoran')->get();
        $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'restoran')->get();
        
        return view('penagihan/restoran/add', compact('wpData'));
    }


    // PENGECEKAN DATA PELUNASAN
    // public function create()
    // {
    //     // Ambil data NPWPD yang sudah diproses dalam halaman pelunasan
    //     $existingNPWPDs = Pgh_restoranPelunasan::pluck('npwpd')->toArray();
        
    //     // Ambil data WP yang belum memiliki penagihan dan belum diproses dalam halaman pelunasan
    //     $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'restoran')->get();
        
    //     return view('penagihan/restoran/add', compact('wpData'));
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
        Pgh_restoran::create([
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

        return redirect()->route('penagihan.restoran.data')->with('success', 'Data berhasil di Tambah');
    }

   public function edit($id)
    {
        $pgh_restoran = Pgh_restoran::findOrFail($id);
        return view('penagihan/restoran/edit', compact('pgh_restoran'));
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
        $pgh_restoran = Pgh_restoran::findOrFail($id);
        $pgh_restoran->update([
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

        return redirect()->route('penagihan.restoran.data')->with('success', 'Data berhasil di Perbarui');
    }

    public function paymentSuccess($id)
    {
        $pgh_restoran = Pgh_restoran::findOrFail($id);

        // Pindahkan data ke tabel pelunasan dengan menambahkan tanggal saat ini
        Pgh_restoranPelunasan::create([
            'npwpd' => $pgh_restoran->npwpd,
            'nama_pajak' => $pgh_restoran->nama_pajak,
            // 'no_penagihan' => $pgh_restoran->no_penagihan,
            'no_telepon' => $pgh_restoran->no_telepon,
            'tanggal' => $pgh_restoran->tanggal,
            'tanggal_pelunasan' => Carbon::now()->toDateString(), // Tanggal pembayaran saat ini
            'omset' => $pgh_restoran->omset,
            'pajak' => $pgh_restoran->pajak,
            // 'denda' => $pgh_restoran->denda,
            'total' => $pgh_restoran->total,
        ]);

        // Hapus data dari tabel penagihan
        $pgh_restoran->delete();

        return redirect()->route('penagihan.restoran.data')->with('success', 'Data Penagihan berhasil di Bayarkan, data Pelunasan berada pada Data Pembayaran.');
    }

    
    public function destroy($id)
    {
        Pgh_restoran::findOrFail($id)->delete();
        return redirect()->route('penagihan.restoran.data')->with('success', 'Data berhasil di Hapus');
    }
    public function showPelunasan()
    {
        // $data = Pgh_restoranPelunasan::all();
        // dd($data); // Tambahkan ini untuk cek data
        $data = Pgh_restoranPelunasan::orderBy('tanggal', 'desc')->get();
        return view('penagihan.restoran.pelunasan', compact('data'));
    }
    
    public function deletePelunasan($id)
    {
        $pgh_restoranPelunasan = Pgh_restoranPelunasan::findOrFail($id);
        $pgh_restoranPelunasan->delete();
        return redirect()->route('penagihan.restoran.pelunasan')->with('success', 'Data Pelunasan berhasil dihapus');
    }   
}