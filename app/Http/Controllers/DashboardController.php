<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function halaman_dashboard()
    {   
        try{
            $selectsMember = array(
                'COUNT(jns_member) AS totMember',
                'jns_member'
            );
            
            $selectsTransaksi = array(
                'COUNT(id_order) AS totOrder',
                'jns_member',
                'status'
            );

            $selectsProdukTerlarisReseller = array(
                'SUM(qty) AS totQty',
                'wip_kode',
                'wip_kategori_stok',
                'warna',
                'ukuran',
            );
            
            $selectsProdukTerlarisStockist = array(
                'SUM(qty_nota) AS totQty',
                'wip_kode',
                'wip_kategori_stok',
                'warna',
                'ukuran',
            );

            $totalMember = Member::selectRaw(implode(',', $selectsMember))
            ->where('jns_member','<>','')
            ->where('userStatus','=','Y')
            ->groupBy('jns_member')
            ->orderBy('jns_member','ASC')
            ->get();

            $totalTransaksi = Transaksi::selectRaw(implode(',', $selectsTransaksi))
            ->where('status','=','Selesai')
            ->groupBy('jns_member')
            ->orderBy('totOrder','DESC')
            ->get();

            $produkTerlarisReseller = Transaksi::selectRaw(implode(',', $selectsProdukTerlarisReseller))
            ->where('status','=','Selesai')
            ->where('wip_kode','<>','')
            ->where('wip_kategori_stok','=','RETAIL WEBSTORE')
            ->groupBy('wip_kode','warna','ukuran')
            ->orderBy('totQty','DESC')
            ->skip(0)
            ->take(10)
            ->get();
            
            $produkTerlarisStockist = Transaksi::selectRaw(implode(',', $selectsProdukTerlarisStockist))
            ->where('status','=','Selesai')
            ->where('wip_kode','<>','')
            ->where('wip_kategori_stok','=','KHUSUS RETAIL')
            ->groupBy('wip_kode','warna','ukuran')
            ->orderBy('totQty','DESC')
            ->skip(0)
            ->take(10)
            ->get();

            return view('panel.pages.dashboard',[
                'totalMember' => $totalMember,
                'totalTransaksi' => $totalTransaksi,
                'produkTerlarisReseller' => $produkTerlarisReseller,
                'produkTerlarisStockist' => $produkTerlarisStockist
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/')->with('dashboard-error', 'Error, Ulangi proses!');
        }
    }
}
