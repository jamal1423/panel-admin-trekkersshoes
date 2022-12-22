<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\ProdukDetail;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TransaksiStockistController extends Controller
{
    public function manifest_baru()
    {
        $transaksiStockistBaru = DB::table('tbl_order_items')
        ->select('tbl_order_items.tgl_order','tbl_order_items.tgl_kembali','tbl_order_items.id_order','tbl_order_items.userlog',
        'tbl_order_items.jns_member','tbl_order_items.status','tbl_order_items.status_approval',
        'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->join('member','tbl_order_items.userlog','=','member.username')
        ->where('tbl_order_items.status','=','Verifikasi Manifest')
        ->where('tbl_order_items.jns_member','=','STOCKIST')
        ->groupBy('tbl_order_items.id_order','tbl_order_items.status','tbl_order_items.userlog','member.nama_depan','member.nama_belakang')
        ->orderBy('tbl_order_items.id_order','DESC')
        ->get();
        return view('panel.pages.transaksi-stockist-baru',[
            'transaksiStockistBaru' => $transaksiStockistBaru
        ]);
    }
    
    public function manifest_proses()
    {
        $transaksiStockistProses = DB::table('tbl_order_items')
        ->select('tbl_order_items.tgl_order','tbl_order_items.tgl_kembali','tbl_order_items.id_order','tbl_order_items.wip_sjt_nomer','tbl_order_items.userlog',
        'tbl_order_items.jns_member','tbl_order_items.status','tbl_order_items.status_approval',
        'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->join('member','tbl_order_items.userlog','=','member.username')
        ->where('tbl_order_items.status','=','Proses')
        ->where('tbl_order_items.jns_member','=','STOCKIST')
        ->where('tbl_order_items.status_approval','=','')
        ->groupBy('tbl_order_items.id_order','tbl_order_items.status','tbl_order_items.userlog','member.nama_depan','member.nama_belakang')
        ->orderBy('tbl_order_items.id_order','DESC')
        ->get();

        $nomerSJT = DB::table('tbl_order_items')
        ->distinct('wip_sjt_nomer')
        ->where('status', '=', 'Proses')
        ->where('wip_sjt_nomer', '<>', '')
        ->groupBy('wip_sjt_nomer','id_order')
        ->get();
        
        return view('panel.pages.transaksi-stockist-proses',[
            'transaksiStockistProses' => $transaksiStockistProses,
            'nomerSJT' => $nomerSJT
        ]);
    }
    
    public function manifest_verifikasi_nota()
    {
        $transaksiStockistVerifikasi = DB::table('tbl_order_items')
        ->select('tbl_order_items.tgl_order','tbl_order_items.tgl_kembali','tbl_order_items.id_order','tbl_order_items.wip_sjt_nomer','tbl_order_items.userlog',
        'tbl_order_items.jns_member','tbl_order_items.status','tbl_order_items.status_approval',
        'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->join('member','tbl_order_items.userlog','=','member.username')
        ->where('tbl_order_items.status','=','Verifikasi Nota')
        ->where('tbl_order_items.jns_member','=','STOCKIST')
        ->where('tbl_order_items.status_approval','<>','')
        ->groupBy('tbl_order_items.id_order','tbl_order_items.status','tbl_order_items.status_approval','tbl_order_items.userlog','member.nama_depan','member.nama_belakang')
        ->orderBy('tbl_order_items.status_approval')
        ->get();

        $nomerSJT = DB::table('tbl_order_items')
        ->distinct('wip_sjt_nomer')
        ->where('status', '=', 'Verifikasi Nota')
        ->where('wip_sjt_nomer', '<>', '')
        ->groupBy('wip_sjt_nomer','id_order')
        ->get();

        return view('panel.pages.transaksi-stockist-verifikasi-nota',[
            'transaksiStockistVerifikasi' => $transaksiStockistVerifikasi,
            'nomerSJT' => $nomerSJT
        ]);
    }
    
    public function manifest_selesai()
    {
        $transaksiStockistSelesai = DB::table('tbl_order_items')
        ->select('tbl_order_items.tgl_order','tbl_order_items.tgl_kembali','tbl_order_items.id_order','tbl_order_items.wip_sjt_nomer','tbl_order_items.userlog',
        'tbl_order_items.jns_member','tbl_order_items.status','tbl_order_items.status_approval',
        'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->join('member','tbl_order_items.userlog','=','member.username')
        ->where('tbl_order_items.status','=','Selesai')
        ->where('tbl_order_items.status_approval','=','Y')
        ->where('tbl_order_items.jns_member','=','STOCKIST')
        ->where('tbl_order_items.qty_nota','>',0)
        ->groupBy('tbl_order_items.id_order','tbl_order_items.status','tbl_order_items.userlog','member.nama_depan','member.nama_belakang')
        ->orderBy('tbl_order_items.id_order','DESC')
        ->get();

        $nomerSJT = DB::table('tbl_order_items')
        ->distinct('wip_sjt_nomer')
        ->where('status', '=', 'Selesai')
        ->where('wip_sjt_nomer', '<>', '')
        ->groupBy('wip_sjt_nomer','id_order')
        ->get();
        // dd($nomerSJT);

        return view('panel.pages.transaksi-stockist-selesai',[
            'transaksiStockistSelesai' => $transaksiStockistSelesai,
            'nomerSJT' => $nomerSJT
        ]);
    }

    public function manifest_detail($id_order,$status_approval,$status)
    {
        $getIDOrder = base64_decode($id_order);
        $getStatusApprove = base64_decode($status_approval);
        $getStatusManifest = base64_decode($status);
        
        if($getStatusApprove == "Y" || $getStatusApprove == "N")
        {
            $detailTransaksi = Transaksi::where('id_order','=',$getIDOrder)
            ->where('status','=',$getStatusManifest)
            ->where('status_approval','=',$getStatusApprove)
            ->get();
        }
        else
        {
            $detailTransaksi = Transaksi::where('id_order','=',$getIDOrder)
            ->where('status','=',$getStatusManifest)
            ->get();
        }

        $getSJT = DB::table('tbl_order_items')
        ->distinct('wip_sjt_nomer')
        ->where('id_order','=',$getIDOrder)
        ->where('wip_sjt_nomer','<>','')
        ->groupBy('wip_sjt_nomer','id_order')
        ->get();

        return view('panel.pages.manifest-detail',[
            'detailTransaksi' => $detailTransaksi,
            'getSJT' => $getSJT
        ]);
    }

    public function approve_manifest(Request $request)
    {
        $validatedData = $request->validate([
            'id_order' => '',
            'id_order_items' => '',
            'customCheck' => ''
        ]);

        // dd($request->customCheck);

        $checked = $request->customCheck;

        if($checked != "")
        {
            Transaksi::whereIn('id_order_items', $request->id_order_items)
            ->update(array('status_approval' => 'Y'));
            
            Transaksi::where('id_order', $request->id_order)
            ->where('status_approval','=','N')
            ->update(array('status_approval' => '', 'status' => 'Proses'));

        }
        else
        {
            Transaksi::whereIn('id_order_items', $request->id_order_items)
            ->update(array('status_approval' => 'Y'));
        }
        return redirect('/manifest-verifikasi-nota')->with('approve-manifest', 'Manifest berhasil diapprove!');
    }

    public function get_manifest_baru()
    {
        try {
            $getManifestBaru = DB::table('tbl_order_items')
            ->distinct('id_order')
            ->where('status','=','Verifikasi Manifest')
            ->count('id_order');

            return response()->json($getManifestBaru);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/manifest-baru')->with('manifest-error', 'Error, silahkan ulangi proses!');
        }
    }

    public function get_manifest_proses()
    {
        try {
            $getManifestProses = DB::table('tbl_order_items')
            ->distinct('id_order')
            ->where('status','=','Proses')
            ->where('wip_stok_khusus','>',0)
            ->count('id_order');

            return response()->json($getManifestProses);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/manifest-baru')->with('manifest-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function get_manifest_verifikasi()
    {
        try {
            $getManifestProses = DB::table('tbl_order_items')
            ->distinct('id_order')
            ->where('status','=','Verifikasi Nota')
            ->count('id_order');

            return response()->json($getManifestProses);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/manifest-baru')->with('manifest-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function get_manifest_selesai()
    {
        try {
            $getManifestProses = DB::table('tbl_order_items')
            ->distinct('id_order')
            ->where('status','=','Selesai')
            ->where('wip_stok_khusus','>',0)
            ->count('id_order');

            return response()->json($getManifestProses);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/manifest-baru')->with('manifest-error', 'Error, silahkan ulangi proses!');
        }
    }

    public function get_data_manifest($id_order){
        try {
            $status = 200;
            $message = "OK";
            $getTransaksi = Transaksi::where('id_order','=', base64_decode($id_order))->first();
            return response()->json([
                'status' => $status,
                'message' => $message,
                'result' => $getTransaksi
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 404;
            $message = "Data tidak ditemukan";
            return response()->json([
                'status' => $status,
                'message' => $message
            ]);
        }
    }

    public function manifest_delete(Request $request){
        try{
            // CEK DATA ORDER
            $cekDataInvoice = Transaksi::select('userlog','id_order')
            ->where('id_order', $request->invoice)
            ->first();
            $userLog  = $cekDataInvoice->userlog;
            $idOrder  = $cekDataInvoice->id_order;
            $status  = $cekDataInvoice->status;
            if($cekDataInvoice->status_approval == ""){
                $statusApprove = "X";
            } else {
                $statusApprove = $cekDataInvoice->status_approval;
            }
			
            $validasi = Transaksi::where('id_order', $request->invoice)
            ->where('status','=','Verifikasi Manifest')
            ->update([
                'status' => 'VOID'
            ]);

            if($validasi){
                // CEK STOK BARANG DIORDER DAN DI MASTER PRODUK
                $cekData = Transaksi::where('id_order','=', $request->invoice)->get();
                foreach($cekData as $datas){
                    $cekStokOrder = Transaksi::select('tbl_order_items.id_order', 'tbl_order_items.wip_kode', 'tbl_order_items.userlog', 
                    'tbl_order_items.wip_kategori_stok', 'tbl_order_items.ukuran', 'tbl_order_items.qty', 'tbl_order_items.status',
                    'tbl_produk_detail.ID AS detail_ID', 'tbl_produk_detail.wip_kode AS detail_wip_kode', 'tbl_produk_detail.wip_kategori AS detail_wip_kategori', 
                    'tbl_produk_detail.wip_size AS detail_wip_size', 'tbl_produk_detail.wip_stok AS detail_wip_stok')
                    ->join('tbl_produk_detail', 'tbl_produk_detail.wip_kode', '=', 'tbl_order_items.wip_kode')
                    ->where('tbl_order_items.id_order', '=', $idOrder)
                    ->where('tbl_order_items.userlog', '=', $userLog)
                    ->where('tbl_produk_detail.wip_size', '=', $datas->ukuran)
                    ->where('tbl_produk_detail.wip_kategori', '=', $datas->wip_kategori_stok)
                    ->get();

                    foreach($cekStokOrder as $stok){
                        $qtyBeli = $stok->qty;
                        $stokProduk = $stok->detail_wip_stok;
                        $upStok = $stokProduk + $qtyBeli;

                        // KEMBALIKAN STOK BARANG
                        ProdukDetail::where('ID', $stok->detail_ID)
                        ->where('wip_size', $stok->detail_wip_size)
                        ->update([
                            'wip_stok' => $upStok
                        ]);
                    }
                }
            }
            return redirect('/manifest-baru/detail/'.base64_encode($idOrder).'/'.base64_encode($statusApprove).'/'.base64_encode($status))->with('void-manifest', "Manifest dibatalkan");
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/manifest-baru/detail/'.base64_encode($idOrder).'/'.base64_encode($statusApprove).'/'.base64_encode($status))->with('error-void-manifest', "Silahkan ulangi proses.");
        }
    }
}