<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupPelangganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PoinController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TransaksiResellerController;
use App\Http\Controllers\TransaksiStockistController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login_admin'])->name('login');
Route::get('/login', [LoginController::class, 'login_admin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate_admin']);
Route::get('/logout', [LoginController::class, 'logout']);

// ROLE ADMINISTRATOR
Route::group(['middleware' => 'role:Administrator'], function () {
  // Route::get('/', [DashboardController::class, 'halaman_dashboard']);
  // Route::get('/produk-all', [ProdukController::class, 'halaman_produk']);
  // Route::get('/produk-baru', [ProdukController::class, 'halaman_produk_baru']);
  // Route::get('/produk-populer', [ProdukController::class, 'halaman_produk_populer']);
  
  // Route::get('/produk/detail/{id}', [ProdukController::class, 'halaman_produk_detail']);
  // Route::patch('/produk-update', [ProdukController::class, 'halaman_produk_update']);

  // RESELLER
  // Route::get('/transaksi-baru', [TransaksiResellerController::class, 'transaksi_reseller_baru']);
  // Route::get('/transaksi-baru/detail/{id_order}', [TransaksiResellerController::class, 'transaksi_reseller_detail']);
  // Route::get('/transaksi-selesai', [TransaksiResellerController::class, 'transaksi_reseller_selesai']);
  // Route::get('/transaksi-selesai/detail/{id_order}', [TransaksiResellerController::class, 'transaksi_reseller_detail']);
  // Route::get('/transaksi-batal', [TransaksiResellerController::class, 'transaksi_reseller_batal']);
  // Route::get('/transaksi-batal/detail/{id_order}', [TransaksiResellerController::class, 'transaksi_reseller_detail']);
  // Route::patch('/transaksi-update', [TransaksiResellerController::class, 'update_status_order']);
  // Route::patch('/transaksi-selesai', [TransaksiResellerController::class, 'transaksi_selesai']);
  // Route::delete('/transaksi-delete', [TransaksiResellerController::class, 'transaksi_delete']);

  // Route::get('/get-data-transaksi-baru', [TransaksiResellerController::class, 'get_transaksi_baru']);
  // Route::get('/get-data-transaksi-selesai', [TransaksiResellerController::class, 'get_transaksi_selesai']);
  // Route::get('/get-data-transaksi-batal', [TransaksiResellerController::class, 'get_transaksi_batal']);
  // Route::get('/get-data-transaksi/{id_order}', [TransaksiResellerController::class, 'get_data_transaksi']);
  
  // STOCKIST
  // Route::get('/manifest-baru', [TransaksiStockistController::class, 'manifest_baru']);
  // Route::get('/manifest-baru/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  // Route::get('/manifest-proses', [TransaksiStockistController::class, 'manifest_proses']);
  // Route::get('/manifest-proses/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  // Route::get('/manifest-verifikasi-nota', [TransaksiStockistController::class, 'manifest_verifikasi_nota']);
  // Route::get('/manifest-verifikasi/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  // Route::get('/manifest-selesai', [TransaksiStockistController::class, 'manifest_selesai']);
  // Route::get('/manifest-selesai/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  // Route::delete('/manifest-delete', [TransaksiStockistController::class, 'manifest_delete']);
  
  // Route::get('/get-data-manifest-baru', [TransaksiStockistController::class, 'get_manifest_baru']);
  // Route::get('/get-data-manifest-proses', [TransaksiStockistController::class, 'get_manifest_proses']);
  // Route::get('/get-data-manifest-verifikasi-nota', [TransaksiStockistController::class, 'get_manifest_verifikasi']);
  // Route::get('/get-data-manifest-selesai', [TransaksiStockistController::class, 'get_manifest_selesai']);
  // Route::get('/get-data-manifest/{id_order}', [TransaksiStockistController::class, 'get_data_manifest']);

  // Route::patch('/proses-approve-manifest', [TransaksiStockistController::class, 'approve_manifest']);

  // LAPORAN
  // Route::get('/laporan-penjualan-pelanggan', [LaporanController::class, 'laporan_penjualan_pelanggan']);
  // Route::get('/laporan-penjualan-trekkers-link', [LaporanController::class, 'laporan_penjualan_trekkers_link']);
  // Route::get('/laporan-fee-koordinator', [LaporanController::class, 'laporan_fee_koordinator']);
  // Route::get('/laporan-produk-favorit', [LaporanController::class, 'laporan_produk_favorit']);

  // ADMIN
  Route::get('/admin-trekkers', [AdminController::class, 'admin_trekkers']);
  Route::post('/admin-trekkers/tambah', [AdminController::class, 'admin_trekkers_tambah']);
  Route::patch('/admin-trekkers/edit', [AdminController::class, 'admin_trekkers_edit']);
  Route::delete('/admin-trekkers/delete', [AdminController::class, 'admin_trekkers_delete']);
  Route::patch('/admin-trekkers/reset-pass', [AdminController::class, 'admin_trekkers_reset_pass']);
  Route::get('/get-admin-trekkers/{user_id}', [AdminController::class, 'get_data_admin']);

  // MEMBER
  // Route::get('/member-trekkers', [MemberController::class, 'member_trekkers']);
  // Route::get('/member-verifikasi', [MemberController::class, 'member_trekkers_verifikasi']);
  // Route::patch('/member-approve-verifikasi', [MemberController::class, 'member_trekkers_approve_verifikasi']);
  // Route::patch('/member-trekkers/edit', [MemberController::class, 'member_trekkers_edit']);
  // Route::get('/get-data-member/{id_member}', [MemberController::class, 'get_data_member']);
  // Route::get('/get-data-member-verifikasi/{id_member}', [MemberController::class, 'get_data_member_verifikasi']);

  // SLIDER
  // Route::get('/setting-slider', [SliderController::class, 'data_slider']);
  // Route::post('/setting-slider/tambah', [SliderController::class, 'data_slider_tambah']);
  // Route::patch('/setting-slider/update', [SliderController::class, 'data_slider_update']);
  // Route::delete('/setting-slider/delete', [SliderController::class, 'data_slider_delete']);
  // Route::get('/get-data-slider/{id}', [SliderController::class, 'get_data_slider']);

  // POIN DAN CASHBACK
  Route::get('/setting-poin', [PoinController::class, 'data_poin']);
  Route::get('/setting-cashback', [PoinController::class, 'data_cashback']);
  Route::get('/setting-daily-visit', [PoinController::class, 'data_daily_visit']);
  Route::patch('/setting-poin-cashback/update', [PoinController::class, 'data_poin_cashback_update']);
  Route::patch('/setting-cashback/update', [PoinController::class, 'data_cashback_update']);
  Route::patch('/setting-dalily-visit/update', [PoinController::class, 'data_daily_visit_update']);

  // GROUP PELANGGAN
  Route::get('/setting-group-pelanggan', [GroupPelangganController::class, 'data_group_pelanggan']);
  Route::get('/get-data-group-pelanggan', [GroupPelangganController::class, 'get_data_group_pelanggan']);

  // VOUCHER
  Route::get('/setting-voucher', [VoucherController::class, 'data_voucher']);
  Route::post('/setting-voucher/tambah', [VoucherController::class, 'data_voucher_tambah']);
  Route::post('/setting-voucher/edit', [VoucherController::class, 'data_voucher_edit']);
  Route::delete('/setting-voucher/delete', [VoucherController::class, 'data_voucher_delete']);
  Route::get('/get-data-voucher/{id_voucher}', [VoucherController::class, 'get_data_voucher']);

  // BONUS PELANGGAN, KOORDINATOR DAN RESELLER
  Route::get('/setting-bonus-pelanggan', [BonusController::class, 'data_bonus_pelanggan']);
  Route::get('/get-bonus-koordinator/{ID}', [BonusController::class, 'get_data_bonus_koordinator']);
  Route::get('/get-bonus-reseller/{ID}', [BonusController::class, 'get_data_bonus_reseller']);
  Route::patch('/bonus-koordinator/update', [BonusController::class, 'bonus_koordinator_update']);
  Route::patch('/bonus-reseller/update', [BonusController::class, 'bonus_reseller_update']);

  // PROMO BARANG
  Route::get('/setting-promo-barang', [PromoController::class, 'data_promo_barang']);
  Route::get('/get-promo-barang/{id}', [PromoController::class, 'get_promo_barang']);
  Route::post('/setting-promo-barang/tambah', [PromoController::class, 'promo_barang_tambah']);
  Route::patch('/setting-promo-barang/update', [PromoController::class, 'promo_barang_update']);

  // URL SOSMED
  // Route::get('/setting-url-sosmed', [UrlController::class, 'data_url']);
  // Route::post('/setting-url-sosmed/tambah', [UrlController::class, 'data_url_tambah']);
  // Route::patch('/setting-url-sosmed/update', [UrlController::class, 'data_url_update']);
  // Route::delete('/setting-url-sosmed/delete', [UrlController::class, 'data_url_delete']);
  // Route::get('/get-data-url/{id}', [UrlController::class, 'get_data_url']);
});

// AKSES ADMINISTRATOR DAN WEB-ADMIN
Route::group(['middleware' => ['role:Administrator|WebAdmin']], function () {
  Route::get('/produk-all', [ProdukController::class, 'halaman_produk']);
  Route::post('/produk-cari', [ProdukController::class, 'halaman_produk']);
  Route::get('/produk-cari', [ProdukController::class, 'halaman_produk']);

  Route::get('/produk-baru', [ProdukController::class, 'halaman_produk_baru']);
  Route::post('/produk-baru-cari', [ProdukController::class, 'halaman_produk_baru']);
  Route::get('/produk-baru-cari', [ProdukController::class, 'halaman_produk_baru']);

  Route::get('/produk-populer', [ProdukController::class, 'halaman_produk_populer']);
  Route::post('/produk-populer-cari', [ProdukController::class, 'halaman_produk_populer']);
  Route::get('/produk-populer-cari', [ProdukController::class, 'halaman_produk_populer']);
  
  Route::get('/produk/detail/{id}', [ProdukController::class, 'halaman_produk_detail']);
  Route::patch('/produk-update', [ProdukController::class, 'halaman_produk_update']);

  // RESELLER
  Route::get('/transaksi-baru', [TransaksiResellerController::class, 'transaksi_reseller_baru']);
  Route::get('/transaksi-baru/detail/{id_order}', [TransaksiResellerController::class, 'transaksi_reseller_detail']);
  Route::get('/transaksi-selesai', [TransaksiResellerController::class, 'transaksi_reseller_selesai']);
  Route::get('/transaksi-selesai/detail/{id_order}', [TransaksiResellerController::class, 'transaksi_reseller_detail']);
  Route::get('/transaksi-batal', [TransaksiResellerController::class, 'transaksi_reseller_batal']);
  Route::get('/transaksi-batal/detail/{id_order}', [TransaksiResellerController::class, 'transaksi_reseller_detail']);
  Route::patch('/transaksi-update', [TransaksiResellerController::class, 'update_status_order']);
  Route::patch('/transaksi-selesai', [TransaksiResellerController::class, 'transaksi_selesai']);
  Route::delete('/transaksi-delete', [TransaksiResellerController::class, 'transaksi_delete']);

  Route::get('/get-data-transaksi-baru', [TransaksiResellerController::class, 'get_transaksi_baru']);
  Route::get('/get-data-transaksi-selesai', [TransaksiResellerController::class, 'get_transaksi_selesai']);
  Route::get('/get-data-transaksi-batal', [TransaksiResellerController::class, 'get_transaksi_batal']);
  Route::get('/get-data-transaksi/{id_order}', [TransaksiResellerController::class, 'get_data_transaksi']);

  // MEMBER
  Route::get('/member-trekkers', [MemberController::class, 'member_trekkers']);
  Route::get('/member-verifikasi', [MemberController::class, 'member_trekkers_verifikasi']);
  Route::patch('/member-approve-verifikasi', [MemberController::class, 'member_trekkers_approve_verifikasi']);
  Route::patch('/member-trekkers/edit', [MemberController::class, 'member_trekkers_edit']);
  Route::get('/get-data-member/{id_member}', [MemberController::class, 'get_data_member']);
  Route::get('/get-data-member-verifikasi/{id_member}', [MemberController::class, 'get_data_member_verifikasi']);
  Route::get('/get-data-member-baru', [MemberController::class, 'get_data_member_baru']);

  // SLIDER
  Route::get('/setting-slider', [SliderController::class, 'data_slider']);
  Route::post('/setting-slider/tambah', [SliderController::class, 'data_slider_tambah']);
  Route::patch('/setting-slider/update', [SliderController::class, 'data_slider_update']);
  Route::delete('/setting-slider/delete', [SliderController::class, 'data_slider_delete']);
  Route::get('/get-data-slider/{id}', [SliderController::class, 'get_data_slider']);

  Route::get('/setting-url-sosmed', [UrlController::class, 'data_url']);
  Route::post('/setting-url-sosmed/tambah', [UrlController::class, 'data_url_tambah']);
  Route::patch('/setting-url-sosmed/update', [UrlController::class, 'data_url_update']);
  Route::delete('/setting-url-sosmed/delete', [UrlController::class, 'data_url_delete']);
  Route::get('/get-data-url/{id}', [UrlController::class, 'get_data_url']);
});

// AKSES ADMINISTRATOR DAN GUDANG JADI
Route::group(['middleware' => ['role:Administrator|GudangJadi']], function () {
  // STOCKIST
  Route::get('/manifest-baru', [TransaksiStockistController::class, 'manifest_baru']);
  Route::get('/manifest-baru/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  Route::get('/manifest-proses', [TransaksiStockistController::class, 'manifest_proses']);
  Route::get('/manifest-proses/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  Route::get('/manifest-verifikasi-nota', [TransaksiStockistController::class, 'manifest_verifikasi_nota']);
  Route::get('/manifest-verifikasi/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  Route::get('/manifest-selesai', [TransaksiStockistController::class, 'manifest_selesai']);
  Route::get('/manifest-selesai/detail/{id_order}/{status_approval}/{status}', [TransaksiStockistController::class, 'manifest_detail']);
  Route::delete('/manifest-delete', [TransaksiStockistController::class, 'manifest_delete']);
  
  Route::get('/get-data-manifest-baru', [TransaksiStockistController::class, 'get_manifest_baru']);
  Route::get('/get-data-manifest-proses', [TransaksiStockistController::class, 'get_manifest_proses']);
  Route::get('/get-data-manifest-verifikasi-nota', [TransaksiStockistController::class, 'get_manifest_verifikasi']);
  Route::get('/get-data-manifest-selesai', [TransaksiStockistController::class, 'get_manifest_selesai']);
  Route::get('/get-data-manifest/{id_order}', [TransaksiStockistController::class, 'get_data_manifest']);

  Route::patch('/proses-approve-manifest', [TransaksiStockistController::class, 'approve_manifest']);
});

// AKSES ALL USER
Route::group(['middleware' => ['role:Administrator|WebAdmin|GudangJadi|KoordinatorReseller']], function () {
  Route::get('/dashboard', [DashboardController::class, 'halaman_dashboard']);

  Route::get('/laporan-penjualan-pelanggan', [LaporanController::class, 'laporan_penjualan_pelanggan']);
  Route::get('/laporan-penjualan-trekkers-link', [LaporanController::class, 'laporan_penjualan_trekkers_link']);
  Route::get('/laporan-fee-koordinator', [LaporanController::class, 'laporan_fee_koordinator']);
  Route::get('/laporan-produk-favorit', [LaporanController::class, 'laporan_produk_favorit']);

  Route::get('/profil', [AdminController::class, 'profil']);
  Route::get('/get-profil/{user_id}', [AdminController::class, 'get_data_profil']);
  Route::patch('/profil-update', [AdminController::class, 'profil_update']);
});