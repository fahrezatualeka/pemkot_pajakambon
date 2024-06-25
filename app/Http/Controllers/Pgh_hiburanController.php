<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pgh_hiburan;
use App\Models\Wp;
use App\Models\Pgh_hiburanPelunasan;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Pgh_hiburanController extends Controller
{
    public function index()
    {
        $data = Pgh_hiburan::orderBy('tanggal', 'desc')->get();
        return view('penagihan/hiburan/data', compact('data'));
    }
    
    // PENGECEKAN DATA HALAMAN
    public function create()
    {
        // Ambil data WP yang belum memiliki penagihan
        // $existingNPWPDs = Pgh_hiburan::pluck('npwpd')->toArray();
        $existingNPWPDs = Pgh_hiburanPelunasan::pluck('npwpd')->toArray();
        
        // $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'hiburan')->get();
        $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'hiburan')->get();
        
        return view('penagihan/hiburan/add', compact('wpData'));
    }


    // PENGECEKAN DATA PELUNASAN
    // public function create()
    // {
    //     // Ambil data NPWPD yang sudah diproses dalam halaman pelunasan
    //     $existingNPWPDs = Pgh_hiburanPelunasan::pluck('npwpd')->toArray();
        
    //     // Ambil data WP yang belum memiliki penagihan dan belum diproses dalam halaman pelunasan
    //     $wpData = Wp::whereNotIn('npwpd', $existingNPWPDs)->where('jenis', 'hiburan')->get();
        
    //     return view('penagihan/hiburan/add', compact('wpData'));
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
        Pgh_hiburan::create([
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

        return redirect()->route('penagihan.hiburan.data')->with('success', 'Data berhasil di Tambah');
    }

   public function edit($id)
    {
        $pgh_hiburan = Pgh_hiburan::findOrFail($id);
        return view('penagihan/hiburan/edit', compact('pgh_hiburan'));
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
        $pgh_hiburan = Pgh_hiburan::findOrFail($id);
        $pgh_hiburan->update([
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

        return redirect()->route('penagihan.hiburan.data')->with('success', 'Data berhasil di Perbarui');
    }

    public function paymentSuccess($id)
    {
        $pgh_hiburan = Pgh_hiburan::findOrFail($id);

        // Pindahkan data ke tabel pelunasan dengan menambahkan tanggal saat ini
        Pgh_hiburanPelunasan::create([
            'npwpd' => $pgh_hiburan->npwpd,
            'nama_pajak' => $pgh_hiburan->nama_pajak,
            // 'no_penagihan' => $pgh_hiburan->no_penagihan,
            'no_telepon' => $pgh_hiburan->no_telepon,
            'tanggal' => $pgh_hiburan->tanggal,
            'tanggal_pelunasan' => Carbon::now()->toDateString(), // Tanggal pembayaran saat ini
            'omset' => $pgh_hiburan->omset,
            'pajak' => $pgh_hiburan->pajak,
            // 'denda' => $pgh_hiburan->denda,
            'total' => $pgh_hiburan->total,
        ]);

        // Hapus data dari tabel penagihan
        $pgh_hiburan->delete();

        return redirect()->route('penagihan.hiburan.data')->with('success', 'Data Penagihan berhasil di Bayarkan, data Pelunasan berada pada Data Pembayaran.');
    }

    
    public function destroy($id)
    {
        Pgh_hiburan::findOrFail($id)->delete();
        return redirect()->route('penagihan.hiburan.data')->with('success', 'Data berhasil di Hapus');
    }
    public function showPelunasan()
    {
        // $data = Pgh_hiburanPelunasan::all();
        // dd($data); // Tambahkan ini untuk cek data
        $data = Pgh_hiburanPelunasan::orderBy('tanggal', 'desc')->get();
        return view('penagihan.hiburan.pelunasan', compact('data'));
    }
    
    public function deletePelunasan($id)
    {
        $pgh_hiburanPelunasan = Pgh_hiburanPelunasan::findOrFail($id);
        $pgh_hiburanPelunasan->delete();
        return redirect()->route('penagihan.hiburan.pelunasan')->with('success', 'Data Pelunasan berhasil dihapus');
    }   
}