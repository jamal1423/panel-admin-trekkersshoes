<?php

namespace App\Http\Controllers;

use App\Models\MasterPelanggan;
use App\Models\ProdukFavorit;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan_penjualan_pelanggan(Request $request)
    {
        $tglAwal = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;
        $jnsPelanggan = $request->jnsPelanggan;

        $now = Carbon::now();
        $yearNow = $now->year;
        $monthNow =  $now->month;

        $dataJenisMember = MasterPelanggan::where('wip_template_barang', '<>','')->get();

        $selects = array(
            'COUNT(DISTINCT(tbl_order_items.id_order)) AS totalTransaksi',
            'SUM(tbl_order_items.qty) AS totQty',
            'SUM(tbl_order_items.qty_nota) as totQtyNota',
            'SUM(tbl_order_items.qty * tbl_order_items.harga) as totBeli',
            'SUM(tbl_order_items.qty_nota * tbl_order_items.harga) as totBeliManifest',
            'tbl_order_items.userlog',
            'tbl_order_items.nama_pelanggan',
            'tbl_order_items.jns_member',
            'tbl_order_items.qty',
            'tbl_order_items.qty_nota',
            'tbl_order_items.harga'
        );

        if ($jnsPelanggan == "all" && $tglAwal != "" && $tglAkhir != "") {
            $getPenjualanPelanggan = Transaksi::selectRaw(implode(',', $selects))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->whereDate('tgl_order', '>=', $tglAwal)
            ->whereDate('tgl_order', '<=', $tglAkhir)
            ->groupBy('tbl_order_items.userlog','tbl_order_items.jns_member')
            ->orderBy('totBeli','DESC')
            ->get();
        } elseif ($jnsPelanggan != "all" && $tglAwal != "" && $tglAkhir != "") {
            $getPenjualanPelanggan = Transaksi::selectRaw(implode(',', $selects))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->where('tbl_order_items.jns_member', '=', $jnsPelanggan)
            ->whereDate('tgl_order', '>=', $tglAwal)
            ->whereDate('tgl_order', '<=', $tglAkhir)
            ->groupBy('tbl_order_items.userlog','tbl_order_items.jns_member')
            ->orderBy('totBeli','DESC')
            ->get();
        } else {
            $getPenjualanPelanggan = Transaksi::selectRaw(implode(',', $selects))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->whereMonth('tgl_order', '=', $monthNow)
            ->whereYear('tgl_order', '=', $yearNow)
            ->groupBy('tbl_order_items.userlog','tbl_order_items.jns_member')
            ->orderBy('totBeli','DESC')
            ->get();
        }

        return view('panel.pages.laporan.lap-penjualan-per-pelanggan',[
            'getPenjualanPelanggan' => $getPenjualanPelanggan,
            'dataJenisMember' => $dataJenisMember,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir,
            'jnsPelanggan' => $jnsPelanggan
        ]);
    }
    
    public function laporan_penjualan_trekkers_link(Request $request)
    {
        $tglAwal = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;
        $jnsPelanggan = $request->jnsPelanggan;

        $now = Carbon::now();
        $yearNow = $now->year;
        $monthNow =  $now->month;
        // dd([$now->year,$now->month,$now->weekOfYear]);

        $dataJenisMember = MasterPelanggan::where('wip_template_barang', '<>','')->get();
        
        $selects1 = array(
            'DISTINCT(tbl_order_items.id_order) as idOrder',
            'tbl_order_items.id_order',
            'tbl_order_items.wip_kode',
            'tbl_order_items.warna',
            'tbl_order_items.ukuran',
            'tbl_order_items.harga',
            'tbl_order_items.qty',
            'tbl_order_items.nama_pelanggan',
            'tbl_order_items.jns_member',
            'tbl_order_items.alamat',
            'tbl_order_items.alamat_lain',
            'tbl_order_items.userlog',
            'tbl_order_items.jarak_tempuh',
            'tbl_order_items.expedisi',
            'tbl_order_items.expedisi_paket',
            'tbl_order_items.subsidi_ongkir',
            'tbl_order_items.ongkir_tmp'
        );
        
        $selects2 = array(
            'tbl_order_items.id_order',
            'tbl_order_items.wip_kode',
            'tbl_order_items.warna',
            'tbl_order_items.ukuran',
            'tbl_order_items.harga',
            'tbl_order_items.qty',
            'tbl_order_items.nama_pelanggan',
            'tbl_order_items.jns_member',
            'tbl_order_items.alamat',
            'tbl_order_items.alamat_lain',
            'tbl_order_items.userlog',
            'tbl_order_items.jarak_tempuh',
            'tbl_order_items.expedisi',
            'tbl_order_items.expedisi_paket',
            'tbl_order_items.subsidi_ongkir',
            'tbl_order_items.ongkir_tmp'
        );

        if ($jnsPelanggan == "all" && $tglAwal != "" && $tglAkhir != "") {
            $getInvoice = Transaksi::selectRaw(implode(',', $selects1))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->whereDate('tbl_order_items.tgl_order', '>=', $tglAwal)
            ->whereDate('tbl_order_items.tgl_order', '<=', $tglAkhir)
            ->where('tbl_order_items.expedisi_paket','=','Free Ongkir - Rp. 0')
            ->groupBy('idOrder')
            ->get();

            $getItems = Transaksi::selectRaw(implode(',', $selects2))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->whereDate('tbl_order_items.tgl_order', '>=', $tglAwal)
            ->whereDate('tbl_order_items.tgl_order', '<=', $tglAkhir)
            ->where('tbl_order_items.expedisi_paket','=','Free Ongkir - Rp. 0')
            ->get();

        } elseif ($jnsPelanggan != "all" && $tglAwal != "" && $tglAkhir != "") {
            $getInvoice = Transaksi::selectRaw(implode(',', $selects1))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->where('tbl_order_items.jns_member', '=', $jnsPelanggan)
            ->whereDate('tbl_order_items.tgl_order', '>=', $tglAwal)
            ->whereDate('tbl_order_items.tgl_order', '<=', $tglAkhir)
            ->where('tbl_order_items.expedisi_paket','=','Free Ongkir - Rp. 0')
            ->groupBy('idOrder')
            ->get();

            $getItems = Transaksi::selectRaw(implode(',', $selects2))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->where('tbl_order_items.jns_member', '=', $jnsPelanggan)
            ->whereDate('tbl_order_items.tgl_order', '>=', $tglAwal)
            ->whereDate('tbl_order_items.tgl_order', '<=', $tglAkhir)
            ->where('tbl_order_items.expedisi_paket','=','Free Ongkir - Rp. 0')
            ->get();
        } else {
            $getInvoice = Transaksi::selectRaw(implode(',', $selects1))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->where('tbl_order_items.jns_member', '=', $jnsPelanggan)
            ->whereMonth('tbl_order_items.tgl_order', '=', $monthNow)
            ->whereYear('tbl_order_items.tgl_order', '=', $yearNow)
            ->where('tbl_order_items.expedisi_paket','=','Free Ongkir - Rp. 0')
            ->groupBy('idOrder')
            ->get();

            $getItems = Transaksi::selectRaw(implode(',', $selects2))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->where('tbl_order_items.jns_member', '=', $jnsPelanggan)
            ->whereMonth('tbl_order_items.tgl_order', '=', $monthNow)
            ->whereYear('tbl_order_items.tgl_order', '=', $yearNow)
            ->where('tbl_order_items.expedisi_paket','=','Free Ongkir - Rp. 0')
            ->get();
        }

        return view('panel.pages.laporan.lap-penjualan-trekkers-link',[
            'getInvoice' => $getInvoice,
            'getItems' => $getItems,
            'dataJenisMember' => $dataJenisMember,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir,
            'jnsPelanggan' => $jnsPelanggan
        ]);
    }
    
    public function laporan_fee_koordinator(Request $request)
    {
        $tglAwal = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;
        $jnsPelanggan = $request->jnsPelanggan;

        $now = Carbon::now();
        $yearNow = $now->year;
        $monthNow =  $now->month;

        $dataJenisMember = MasterPelanggan::where('wip_template_barang', '<>','')->get();

        $admMitra = User::where('adm_mitra','<>','')->get();

        $selects1 = array(
            'tbl_order_items.jns_member',
            'tbl_order_items.tgl_order',
            'SUM(tbl_order_items.qty) AS totQty',
            'tbl_order_items.qty',
            'tbl_order_items.harga',
            'SUM(tbl_order_items.qty * tbl_order_items.harga) as totBeli'
        );


        if ($jnsPelanggan == "all" && $tglAwal != "" && $tglAkhir != "") {
            $getData = Transaksi::selectRaw(implode(',', $selects1))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->whereDate('tbl_order_items.tgl_order', '>=', $tglAwal)
            ->whereDate('tbl_order_items.tgl_order', '<=', $tglAkhir)
            ->where('tbl_order_items.jns_member','<>','END-USER')
            ->where('tbl_order_items.jns_member','<>','PEMKA')
            ->where('tbl_order_items.jns_member','<>','STOCKIST')
            ->where('tbl_order_items.jns_member','<>','UKM')
            ->groupBy('tbl_order_items.jns_member')
            ->orderBy('tbl_order_items.tgl_order')
            ->get();

        } elseif ($jnsPelanggan != "all" && $tglAwal != "" && $tglAkhir != "") {
            $getData = Transaksi::selectRaw(implode(',', $selects1))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->whereDate('tbl_order_items.tgl_order', '>=', $tglAwal)
            ->whereDate('tbl_order_items.tgl_order', '<=', $tglAkhir)
            ->where('tbl_order_items.jns_member','=',$jnsPelanggan)
            ->groupBy('tbl_order_items.jns_member')
            ->orderBy('tbl_order_items.tgl_order')
            ->get();
        } else {
            $getData = Transaksi::selectRaw(implode(',', $selects1))
            ->where('tbl_order_items.status', '=', 'Selesai')
            ->whereMonth('tbl_order_items.tgl_order', '=', $monthNow)
            ->whereYear('tbl_order_items.tgl_order', '=', $yearNow)
            ->where('tbl_order_items.jns_member','<>','END-USER')
            ->where('tbl_order_items.jns_member','<>','PEMKA')
            ->where('tbl_order_items.jns_member','<>','STOCKIST')
            ->where('tbl_order_items.jns_member','<>','UKM')
            ->groupBy('tbl_order_items.jns_member')
            ->orderBy('tbl_order_items.tgl_order')
            ->get();
        }

        return view('panel.pages.laporan.lap-fee-koordinator', [
            'getData' => $getData,
            'dataJenisMember' => $dataJenisMember,
            'admMitra' => $admMitra,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir,
            'jnsPelanggan' => $jnsPelanggan
        ]);
    }
    
    public function laporan_produk_favorit(Request $request)
    {
        $tglAwal = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;
        $jnsPelanggan = $request->jnsPelanggan;

        $now = Carbon::now();
        $yearNow = $now->year;
        $monthNow =  $now->month;

        $selects = array(
            'COUNT(DISTINCT(tbl_wishlist.style_barang)) AS totalArtikel',
            'COUNT(tbl_wishlist.userlog) AS totUser',
            'tbl_wishlist.style_barang',
            'tbl_wishlist.warna_barang',
            'tbl_wishlist.stok_khusus',
            'tbl_wishlist.userlog',
            'tbl_wishlist.jns_member'
        );

        if($tglAwal != "" && $tglAkhir != "") {
            $getData = ProdukFavorit::selectRaw(implode(',', $selects))
            ->whereDate('tbl_wishlist.tgl_wishlist', '>=', $tglAwal)
            ->whereDate('tbl_wishlist.tgl_wishlist', '<=', $tglAkhir)
            ->where('tbl_wishlist.style_barang','<>','')
            ->groupBy('tbl_wishlist.style_barang','tbl_wishlist.warna_barang','tbl_wishlist.stok_khusus','tbl_wishlist.jns_member')
            ->orderBy('totUser','DESC')
            ->get();
        } else {
            $getData = ProdukFavorit::selectRaw(implode(',', $selects))
            ->where('tbl_wishlist.style_barang','<>','')
            ->groupBy('tbl_wishlist.style_barang','tbl_wishlist.warna_barang','tbl_wishlist.stok_khusus','tbl_wishlist.jns_member')
            ->orderBy('totUser','DESC')
            ->get();
        }

        return view('panel.pages.laporan.lap-produk-favorit', [
            'getData' => $getData,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir
        ]);
    }
}
