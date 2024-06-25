<?php

use Illuminate\Support\Facades\Route;

// CONTROLLER REGISTER
use App\Http\Controllers\Auth\RegisterController;

// CONTROLLER LOGIN
use App\Http\Controllers\Auth\LoginController;

// CONTROLLER DASHBOARD
use App\Http\Controllers\DashboardController;

// CONTROLLER WP
use App\Http\Controllers\WpController;
use App\Http\Controllers\Wp_tipeController;

// CONTROLLER PENGAWASAN
use App\Http\Controllers\Pws_hiburanController;
use App\Http\Controllers\Pws_hotelController;
use App\Http\Controllers\Pws_restoranController;

// CONTROLLER PEMERIKSAAN
use App\Http\Controllers\Prs_hiburanController;
use App\Http\Controllers\Prs_hotelController;
use App\Http\Controllers\Prs_restoranController;

// CONTROLLER PENAGIHAN
use App\Http\Controllers\Pgh_hiburanController;
use App\Http\Controllers\Pgh_hotelController;
use App\Http\Controllers\Pgh_restoranController;
use App\Http\Controllers\PaymentMidtransHiburanController;
use App\Http\Controllers\PaymentMidtransHotelController;
use App\Http\Controllers\PaymentMidtransRestoranController;

// CONTROLLER PROFIL
use App\Http\Controllers\ProfileController;

// CONTROLLER PENGGUNA
use App\Http\Controllers\UserController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ROUTE Register
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register/proses', [RegisterController::class, 'store']);

// ROUTE Login
Route::get('/', [LoginController::class, 'index']);
Route::post('/proses', [LoginController::class, 'login']);

// ROUTE DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index']);

// ROUTE WP
// Route::get('/form_datapenjualan_wajibpajak', [WpController::class, 'formIndex'])->name('wp.form');
// Route::get('/form_datapenjualan_wajibpajak/add', [WpController::class, 'formCreate'])->name('wp.formSuccess');
// Route::post('/form_datapenjualan_wajibpajak/add', [WpController::class, 'formStore'])->name('wp.formSuccess');
Route::get('/wp', [WpController::class, 'index'])->name('wp.data');
Route::get('/form_datapenjualan_wajibpajak', [WpController::class, 'create'])->name('wp.create');
Route::post('/form_datapenjualan_wajibpajak', [WpController::class, 'store'])->name('wp.store');
Route::get('/formSuccess', [WpController::class, 'formSuccess'])->name('wp.formSuccess');
Route::get('/wp/edit/{id}', [WpController::class, 'edit'])->name('wp.edit');
Route::put('/wp/update/{id}', [WpController::class, 'update'])->name('wp.update');
Route::delete('/wp/delete/{id}', [WpController::class, 'destroy'])->name('wp.delete');
Route::get('/search-wp', [WpController::class, 'search']);


// ROUTE WP TIPE
Route::get('/wp_tipe', [Wp_tipeController::class, 'index'])->name('wp_tipe.data');
Route::get('/wp_tipe/add', [Wp_tipeController::class, 'create'])->name('wp.create');
Route::post('/wp_tipe/add', [Wp_tipeController::class, 'store'])->name('wp_tipe.store');
Route::get('/wp_tipe/edit/{id}', [Wp_tipeController::class, 'edit'])->name('wp_tipe.edit');
Route::put('/wp_tipe/update/{id}', [Wp_tipeController::class, 'update'])->name('wp_tipe.update');
Route::delete('/wp_tipe/delete/{id}', [Wp_tipeController::class, 'destroy'])->name('wp_tipe.delete');


// PENGAWASAN
// Hiburan
Route::get('/pws_hiburan', [Pws_hiburanController::class, 'index'])->name('pengawasan.hiburan.data');
Route::get('/pws_hiburan/add', [Pws_hiburanController::class, 'create'])->name('pengawasan.hiburan.create');
Route::post('/pws_hiburan/add', [Pws_hiburanController::class, 'store'])->name('pengawasan.hiburan.store');
Route::get('/pws_hiburan/edit/{id}', [Pws_hiburanController::class, 'edit'])->name('pws_hiburan.edit');
Route::put('/pws_hiburan/update/{id}', [Pws_hiburanController::class, 'update'])->name('pws_hiburan.update');
Route::delete('/pws_hiburan/delete/{id}', [Pws_hiburanController::class, 'destroy'])->name('pws_hiburan.delete');


// Hotel
Route::get('/pws_hotel', [Pws_hotelController::class, 'index'])->name('pengawasan.hotel.data');
Route::get('/pws_hotel/add', [Pws_hotelController::class, 'create'])->name('pengawasan.hotel.create');
Route::post('/pws_hotel/add', [Pws_hotelController::class, 'store'])->name('pengawasan.hotel.store');
Route::get('/pws_hotel/edit/{id}', [Pws_hotelController::class, 'edit'])->name('pws_hotel.edit');
Route::put('/pws_hotel/update/{id}', [Pws_hotelController::class, 'update'])->name('pws_hotel.update');
Route::delete('/pws_hotel/delete/{id}', [Pws_hotelController::class, 'destroy'])->name('pws_hotel.delete');


// Restoran
Route::get('/pws_restoran', [Pws_restoranController::class, 'index'])->name('pengawasan.restoran.data');
Route::get('/pws_restoran/add', [Pws_restoranController::class, 'create'])->name('pengawasan.restoran.create');
Route::post('/pws_restoran/add', [Pws_restoranController::class, 'store'])->name('pengawasan.restoran.store');
Route::get('/pws_restoran/edit/{id}', [Pws_restoranController::class, 'edit'])->name('pws_restoran.edit');
Route::put('/pws_restoran/update/{id}', [Pws_restoranController::class, 'update'])->name('pws_restoran.update');
Route::delete('/pws_restoran/delete/{id}', [Pws_restoranController::class, 'destroy'])->name('pws_restoran.delete');


// PEMERIKSAAN
// Hiburan
Route::get('/prs_hiburan', [Prs_hiburanController::class, 'index'])->name('pemeriksaan.hiburan.data');
Route::get('/prs_hiburan/add', [Prs_hiburanController::class, 'create'])->name('pemeriksaan.hiburan.create');
Route::post('/prs_hiburan/add', [Prs_hiburanController::class, 'store'])->name('pemeriksaan.hiburan.store');
Route::get('/prs_hiburan/edit/{id}', [Prs_hiburanController::class, 'edit'])->name('pemeriksaan.hiburan.edit');
Route::put('/prs_hiburan/update/{id}', [Prs_hiburanController::class, 'update'])->name('pemeriksaan.hiburan.update');
Route::delete('/prs_hiburan/delete/{id}', [Prs_hiburanController::class, 'destroy'])->name('pemeriksaan.hiburan.delete');

// Hotel
Route::get('/prs_hotel', [Prs_hotelController::class, 'index'])->name('pemeriksaan.hotel.data');
Route::get('/prs_hotel/add', [Prs_hotelController::class, 'create'])->name('pemeriksaan.hotel.create');
Route::post('/prs_hotel/add', [Prs_hotelController::class, 'store'])->name('pemeriksaan.hotel.store');
Route::get('/prs_hotel/edit/{id}', [Prs_hotelController::class, 'edit'])->name('pemeriksaan.hotel.edit');
Route::put('/prs_hotel/update/{id}', [Prs_hotelController::class, 'update'])->name('pemeriksaan.hotel.update');
Route::delete('/prs_hotel/delete/{id}', [Prs_hotelController::class, 'destroy'])->name('pemeriksaan.hotel.delete');

// Restoran
Route::get('/prs_restoran', [Prs_restoranController::class, 'index'])->name('pemeriksaan.restoran.data');
Route::get('/prs_restoran/add', [Prs_restoranController::class, 'create'])->name('pemeriksaan.restoran.create');
Route::post('/prs_restoran/add', [Prs_restoranController::class, 'store'])->name('pemeriksaan.restoran.store');
Route::get('/prs_restoran/edit/{id}', [Prs_restoranController::class, 'edit'])->name('pemeriksaan.restoran.edit');
Route::put('/prs_restoran/update/{id}', [Prs_restoranController::class, 'update'])->name('pemeriksaan.restoran.update');
Route::delete('/prs_restoran/delete/{id}', [Prs_restoranController::class, 'destroy'])->name('pemeriksaan.restoran.delete');


// PENAGIHAN
// Hiburan
Route::get('/pgh_hiburan', [Pgh_hiburanController::class, 'index'])->name('penagihan.hiburan.data');
Route::get('/pgh_hiburan/add', [Pgh_hiburanController::class, 'create'])->name('penagihan.hiburan.create');
Route::post('/pgh_hiburan/add', [Pgh_hiburanController::class, 'store'])->name('penagihan.hiburan.store');
Route::get('/pgh_hiburan/edit/{id}', [Pgh_hiburanController::class, 'edit'])->name('penagihan.hiburan.edit');
Route::put('/pgh_hiburan/update/{id}', [Pgh_hiburanController::class, 'update'])->name('penagihan.hiburan.update');
Route::delete('/pgh_hiburan/delete/{id}', [Pgh_hiburanController::class, 'destroy'])->name('penagihan.hiburan.delete');
Route::get('/pgh_hiburan/paymentMidtransHiburan/{id}/{npwpd}/{nama_pajak}/{total}', [PaymentMidtransHiburanController::class, 'payment'])->name('penagihan.hiburan.paymentMidtransHiburan');
Route::get('pgh_hiburan/paymentSuccess/{id}', [PaymentMidtransHiburanController::class, 'paymentSuccess'])->name('penagihan.hiburan.paymentSuccess');
Route::get('pgh_hiburan/pelunasan', [Pgh_hiburanController::class, 'showPelunasan'])->name('penagihan.hiburan.pelunasan');
Route::delete('pgh_hiburanPelunasan/delete/{id}', [Pgh_hiburanController::class, 'deletePelunasan'])->name('penagihan.hiburan.deletePelunasan');

// Route::get('wp/getWpByNpwpd', [WpController::class, 'getDataByNpwpd'])->name('wp.getWpByNpwpd');
// Route::get('penagihan/getDataWpByNpwpd', [Pgh_hiburanController::class, 'getDataWpByNpwpd'])->name('penagihan.getDataWpByNpwpd');
// Route::get('/wp-data/{npwpd}/{nama_wajib_pajak}/{no_telepon}/{omset}', [WpController::class, 'getWpData'])->name('wp.data');
// Route::post('/payment', 'PaymentMidtransController@payment');
// Route::get('/pgh_hiburan/paymentLink/{id}', [PaymentMidtransController::class, 'paymentLink'])->name('penagihan.hiburan.paymentLink');
// Route::post('/pgh_hiburan/payment', [Pgh_hiburanController::class, 'payment'])->name('penagihan.hiburan.payment');
// routes/web.php
// Route::post('/pgh_hiburan/payment/callback', [PaymentMidtransController::class, 'handleCallback'])->name('penagihan.hiburan.paymentCallback');
// Pelunasan
// Route::get('pgh_hiburan/paymentSuccess/{id}', [Pgh_hiburanController::class, 'paymentSuccess'])->name('penagihan.hiburan.paymentSuccess');
// Route::get('/pgh_hiburan/kirimPesanWhatsApp/{no_telepon}', [PaymentMidtransController::class, 'kirimPesanWhatsApp'])->name('penagihan.hiburan.kirimPesanWhatsApp');
// Route::get('pgh_hiburan/paymentMidtrans/{id}', [PaymentMidtransController::class, 'payment'])->name('penagihan.hiburan.paymentMidtrans');
// Route::get('pgh_hiburan/paymentSuccessPage/{id}', [PaymentMidtransController::class, 'paymentSuccessPage'])->name('penagihan.hiburan.paymentSuccessPage');
// Route::delete('/pgh_hiburan/pelunasan/delete/{id}', [Pgh_hiburanPelunasanController::class, 'destroy'])->name('penagihan.hiburan.pelunasan.delete');


// Hotel
Route::get('/pgh_hotel', [Pgh_hotelController::class, 'index'])->name('penagihan.hotel.data');
Route::get('/pgh_hotel/add', [Pgh_hotelController::class, 'create'])->name('penagihan.hotel.create');
Route::post('/pgh_hotel/add', [Pgh_hotelController::class, 'store'])->name('penagihan.hotel.store');
Route::get('/pgh_hotel/edit/{id}', [Pgh_hotelController::class, 'edit'])->name('penagihan.hotel.edit');
Route::put('/pgh_hotel/update/{id}', [Pgh_hotelController::class, 'update'])->name('penagihan.hotel.update');
Route::delete('/pgh_hotel/delete/{id}', [Pgh_hotelController::class, 'destroy'])->name('penagihan.hotel.delete');
Route::get('/pgh_hotel/paymentMidtransHotel/{id}/{npwpd}/{nama_pajak}/{total}', [PaymentMidtransHotelController::class, 'payment'])->name('penagihan.hotel.paymentMidtransHotel');
Route::get('pgh_hotel/paymentSuccess/{id}', [PaymentMidtransHotelController::class, 'paymentSuccess'])->name('penagihan.hotel.paymentSuccess');
Route::get('pgh_hotel/pelunasan', [Pgh_hotelController::class, 'showPelunasan'])->name('penagihan.hotel.pelunasan');
Route::delete('pgh_hotelPelunasan/delete/{id}', [Pgh_hotelController::class, 'deletePelunasan'])->name('penagihan.hotel.deletePelunasan');


// Restoran
Route::get('/pgh_restoran', [Pgh_restoranController::class, 'index'])->name('penagihan.restoran.data');
Route::get('/pgh_restoran/add', [Pgh_restoranController::class, 'create'])->name('penagihan.restoran.create');
Route::post('/pgh_restoran/add', [Pgh_restoranController::class, 'store'])->name('penagihan.restoran.store');
Route::get('/pgh_restoran/edit/{id}', [Pgh_restoranController::class, 'edit'])->name('penagihan.restoran.edit');
Route::put('/pgh_restoran/update/{id}', [Pgh_restoranController::class, 'update'])->name('penagihan.restoran.update');
Route::delete('/pgh_restoran/delete/{id}', [Pgh_restoranController::class, 'destroy'])->name('penagihan.restoran.delete');
Route::get('/pgh_restoran/paymentMidtransRestoran/{id}/{npwpd}/{nama_pajak}/{total}', [PaymentMidtransRestoranController::class, 'payment'])->name('penagihan.restoran.paymentMidtransRestoran');
Route::get('pgh_restoran/paymentSuccess/{id}', [PaymentMidtransRestoranController::class, 'paymentSuccess'])->name('penagihan.restoran.paymentSuccess');
Route::get('pgh_restoran/pelunasan', [Pgh_restoranController::class, 'showPelunasan'])->name('penagihan.restoran.pelunasan');
Route::delete('pgh_restoranPelunasan/delete/{id}', [Pgh_restoranController::class, 'deletePelunasan'])->name('penagihan.restoran.deletePelunasan');


// ROUTE Profil
Route::get('/profile', [ProfileController::class, 'index']);
// Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');

// ROUTE Pengguna
// Route::get('/user', [UserController::class, 'index']);

// PAYMENT MIDTRANS
// Route::get('/pgh_hiburan/payment', [PaymentController::class, 'payment']);