<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Pgh_restoran;
use App\Models\Pgh_restoranPelunasan;
use Carbon\Carbon;

class PaymentMidtransRestoranController extends Controller
{
    public function payment($id, $npwpd, $nama_pajak, $total){
        
        // $id = $request->input('id');
        // $npwpd = $request->input('npwpd');
        // $nama_pajak = $request->input('nama_pajak');
        // $no_penagihan = $request->input('no_penagihan');
        // $total = $request->input('total');
        $params = [
            'transaction_details' => [
                'order_id' => $id,
                'gross_amount' => (int)$total
            ],
            'customer_details' => [
                'first_name' => $nama_pajak,
                'phone' => $npwpd
            ],
        ];

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = !env('MIDTRANS_IS_SANDBOX');
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $payment = Snap::getSnapToken($params);

        return view('penagihan.restoran.paymentMidtransRestoran', compact('payment', 'id'));
    }

    public function paymentSuccess($id)
    {
        // Temukan data pembayaran berdasarkan ID
        $pgh_restoran = Pgh_restoran::findOrFail($id);

        // Dapatkan tanggal saat ini
        $tanggal_sekarang = Carbon::now()->toDateString();
        

        // Pindahkan data pembayaran ke tabel pelunasan dengan menambahkan tanggal saat ini
        Pgh_restoranPelunasan::create([
            'npwpd' => $pgh_restoran->npwpd,
            'nama_pajak' => $pgh_restoran->nama_pajak,
            'no_telepon' => $pgh_restoran->no_telepon,
            'tanggal' => $pgh_restoran->tanggal,
            'tanggal_pelunasan' => $tanggal_sekarang, // Gunakan tanggal saat ini
            'omset' => $pgh_restoran->omset,
            'pajak' => $pgh_restoran->pajak,
            'total' => $pgh_restoran->total
        ]);
    
        // Hapus data pembayaran dari tabel penagihan
        $pgh_restoran->delete();
    
        // Redirect pengguna ke halaman WhatsApp
        $nomor_telepon = '6282248302960';
        return redirect()->away("https://wa.me/{$nomor_telepon}");
    }
    
    // public function sendWhatsAppMessage() {
    //     // Ganti nomor_telepon dengan nomor telepon yang ditentukan
    //     $nomor_telepon = '6282248302960';
    //     // Konfigurasi pesan yang akan dikirim ke WhatsApp
    //     $message = "Pembayaran Anda telah berhasil! Terima kasih telah menggunakan layanan kami.";
    //     // Encode pesan untuk URL
    //     $encoded_message = urlencode($message);
    //     // Redirect pengguna ke WhatsApp
    //     return redirect()->away("https://wa.me/{$nomor_telepon}?text={$encoded_message}");
    // }

    // public function paymentSuccessPage() {
    //     // Lakukan tindakan yang sesuai di sini, seperti mengarahkan ke halaman WhatsApp
    //     return redirect()->away('https://wa.me/6282248302960');
    // }
    

    // public function paymentSuccess($id) {
    //     // Temukan entri penagihan berdasarkan ID
    //     $pgh_restoran = Pgh_restoran::findOrFail($id);
    
    //     // Temukan data pengguna berdasarkan entri penagihan (misalnya, jika penagihan terkait dengan pengguna tertentu)
    //     $user = $pgh_restoran->user; // Asumsi relasi antara Pgh_restoran dan User sudah didefinisikan
    
    //     // Panggil fungsi untuk mengarahkan pengguna kembali ke WhatsApp dengan nomor telepon pengguna
    //     return redirect()->route('penagihan.restoran.kirimPesanWhatsApp', $user->no_telepon);
    // }
    
    // public function kirimPesanWhatsApp($no_telepon) {
    //     // Konfigurasi URL untuk mengarahkan pengguna kembali ke WhatsApp
    //     $url = "https://wa.me/{$no_telepon}";
    
    //     // Redirect pengguna ke URL WhatsApp
    //     return redirect()->away($url);
    // }

    // public function paymentLink($id)
    // {
    //     // Temukan data berdasarkan ID
    //     $payment = Pgh_restoran::findOrFail($id);

    //     // Ambil parameter yang dibutuhkan untuk link Midtrans
    //     $npwpd = $payment->npwpd;
    //     $nama_pajak = $payment->nama_pajak;
    //     $no_penagihan = $payment->no_penagihan;
    //     $total = $payment->total;

    //     return $this->payment($id, $npwpd, $nama_pajak, $no_penagihan, $total);
    // }
}