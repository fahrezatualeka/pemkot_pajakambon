<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wp;
use App\Models\Wp_tipe;
use App\Models\Pws_hiburan;
use App\Models\Pws_hotel;
use App\Models\Pws_restoran;
use App\Models\Prs_hiburan;
use App\Models\Prs_hotel;
use App\Models\Prs_restoran;
use App\Models\Pgh_hiburan;
use App\Models\Pgh_hotel;
use App\Models\Pgh_restoran;
use App\Models\Pgh_hiburanPelunasan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahDataWp = Wp::count();
        $jumlahDataJenisWp = Wp_tipe::count();
        $jumlahDataPwsHiburan = Pws_hiburan::count();
        $jumlahDataPwsHotel = Pws_hotel::count();
        $jumlahDataPwsRestoran = Pws_restoran::count();
        $jumlahDataPrsHiburan = Prs_hiburan::count();
        $jumlahDataPrsHotel = Prs_hotel::count();
        $jumlahDataPrsRestoran = Prs_restoran::count();
        $jumlahDataPghHiburan = Pgh_hiburan::count();
        $jumlahDataPghHotel = Pgh_hotel::count();
        $jumlahDataPghRestoran = Pgh_restoran::count();
        $jumlahDataPghHiburanPelunasan = Pgh_hiburanPelunasan::count();

        return view('dashboard', compact(
            'jumlahDataWp',
            'jumlahDataJenisWp',
            'jumlahDataPwsHiburan',
            'jumlahDataPwsHotel',
            'jumlahDataPwsRestoran',
            'jumlahDataPrsHiburan',
            'jumlahDataPrsHotel',
            'jumlahDataPrsRestoran',
            'jumlahDataPghHiburan',
            'jumlahDataPghHotel',
            'jumlahDataPghRestoran',
            'jumlahDataPghHiburanPelunasan'
        ));
    }
}