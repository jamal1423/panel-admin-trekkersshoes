<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Mailer\MailController;
use App\Models\SettingPoin;
use App\Models\Member;
use App\Models\ProdukDetail;
use App\Models\Promo;
use App\Models\RekapPoinReward;
use App\Models\Ulasan;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class TransaksiResellerController extends Controller
{
    private $mailControl;

    public function __construct(MailController $mailController)
    {
        $this->mailControl = $mailController;
    }

    public function transaksi_reseller_baru()
    {
        $dataTransaksiBaru = DB::table('tbl_order_items')
        ->select('tbl_order_items.tgl_order','tbl_order_items.id_order','tbl_order_items.userlog','tbl_order_items.jns_member',
        'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->join('member','tbl_order_items.userlog','=','member.username')
        ->where('tbl_order_items.status','<>','Selesai')
        ->where('tbl_order_items.status','<>','VOID')
        ->where('tbl_order_items.status','<>','TMP')
        ->where('tbl_order_items.jns_member','<>','STOCKIST')
        ->groupBy('tbl_order_items.tgl_order','tbl_order_items.id_order', 'tbl_order_items.userlog','tbl_order_items.jns_member', 'tbl_order_items.ongkir', 'tbl_order_items.r_poin', 'tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->orderBy('tbl_order_items.id_order','DESC')
        ->get();

        return view('panel.pages.transaksi-reseller-baru',[
            'dataTransaksiBaru' => $dataTransaksiBaru
        ]);
    }
    
    public function transaksi_reseller_selesai()
    {
        $dataTransaksiSelesai = DB::table('tbl_order_items')
        ->select('tbl_order_items.tgl_order','tbl_order_items.id_order','tbl_order_items.userlog','tbl_order_items.jns_member',
        'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->join('member','tbl_order_items.userlog','=','member.username')
        ->where('tbl_order_items.status','=','Selesai')
        ->where('tbl_order_items.jns_member','<>','STOCKIST')
        ->groupBy('tbl_order_items.tgl_order','tbl_order_items.id_order', 'tbl_order_items.userlog','tbl_order_items.jns_member', 'tbl_order_items.ongkir', 'tbl_order_items.r_poin', 'tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->orderBy('tbl_order_items.id_order','DESC')
        ->get();

        return view('panel.pages.transaksi-reseller-selesai',[
            'dataTransaksiSelesai' => $dataTransaksiSelesai
        ]);
    }
    
    public function transaksi_reseller_batal()
    {
        $dataTransaksiBatal = DB::table('tbl_order_items')
        ->select('tbl_order_items.tgl_order','tbl_order_items.id_order','tbl_order_items.userlog','tbl_order_items.jns_member',
        'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->join('member','tbl_order_items.userlog','=','member.username')
        ->where('tbl_order_items.status','=','VOID')
        ->where('tbl_order_items.jns_member','<>','STOCKIST')
        ->groupBy('tbl_order_items.tgl_order','tbl_order_items.id_order', 'tbl_order_items.userlog','tbl_order_items.jns_member', 'tbl_order_items.ongkir', 'tbl_order_items.r_poin', 'tbl_order_items.r_wallet',
        'tbl_order_items.status','member.nama_depan','member.nama_belakang')
        ->orderBy('tbl_order_items.id_order','DESC')
        ->get();

        return view('panel.pages.transaksi-reseller-batal',[
            'dataTransaksiBatal' => $dataTransaksiBatal
        ]);
    }

    public function transaksi_reseller_detail($id_order)
    {
        $getIDOrder = base64_decode($id_order);
        $detailTransaksi = Transaksi::where('id_order','=',$getIDOrder)->get();

        $countID = Transaksi::select('id_barang')
        ->where('id_order', $getIDOrder)
        ->count();
        
        $dataPoin = SettingPoin::all();
        $baseUrlImage = "https://trekkersshoes.com/assets/img/bukti-bayar/";
        return view('panel.pages.transaksi-detail',[
            'detailTransaksi' => $detailTransaksi,
            'dataPoin' => $dataPoin,
            'countID' => $countID,
            'baseUrlImage' => $baseUrlImage
        ]);
    }

    public function get_transaksi_baru()
    {
        try {
            $getTransaksiBaru = DB::table('tbl_order_items')
            ->distinct('id_order')
            ->where('status','<>','Selesai')
            ->where('status','<>','TMP')
            ->where('status','<>','VOID')
            ->where('wip_stok_khusus','=',0)
            ->count('id_order');

            $dataTransaksiBaru = DB::table('tbl_order_items')
            ->select('tbl_order_items.tgl_order','tbl_order_items.id_order','tbl_order_items.userlog','tbl_order_items.jns_member',
            'tbl_order_items.ongkir','tbl_order_items.r_poin','tbl_order_items.r_wallet',
            'tbl_order_items.status','member.nama_depan','member.nama_belakang')
            ->join('member','tbl_order_items.userlog','=','member.username')
            ->where('tbl_order_items.status','<>','Selesai')
            ->where('tbl_order_items.status','<>','VOID')
            ->where('tbl_order_items.status','<>','TMP')
            ->where('tbl_order_items.jns_member','<>','STOCKIST')
            ->groupBy('tbl_order_items.tgl_order','tbl_order_items.id_order', 'tbl_order_items.userlog','tbl_order_items.jns_member', 'tbl_order_items.ongkir', 'tbl_order_items.r_poin', 'tbl_order_items.r_wallet',
            'tbl_order_items.status','member.nama_depan','member.nama_belakang')
            ->orderBy('tbl_order_items.id_order','DESC')
            ->get();

            return response()->json([
                'getTransaksiBaru' => $getTransaksiBaru,
                'dataTransaksiBaru' => $dataTransaksiBaru

            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi-baru')->with('transaksi-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function get_transaksi_selesai()
    {
        try {
            $getTransaksiSelesai = DB::table('tbl_order_items')
            ->distinct('id_order')
            ->where('status','=','Selesai')
            ->where('wip_stok_khusus','=',0)
            ->count('id_order');
            return response()->json($getTransaksiSelesai);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi-selesai')->with('transaksi-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function get_transaksi_batal()
    {
        try {
            $getTransaksiSelesai = DB::table('tbl_order_items')
            ->distinct('id_order')
            ->where('status','=','VOID')
            ->where('wip_stok_khusus','=',0)
            ->count('id_order');
            return response()->json($getTransaksiSelesai);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi-batal')->with('transaksi-error', 'Error, silahkan ulangi proses!');
        }
    }

    public function update_status_order(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'status' => 'required',
                'email' => 'required',
                'resi' => '',
                'invoice' => 'required',
                'nama_pelanggan' => 'required',
                'mode' => 'required'
            ]);
            
            $cekValid = Transaksi::where('id_order', $request->invoice)
            ->update([
                'status' => $request->status,
                'resi' => $request->resi,
            ]);
            if($cekValid)
            {
                $this->mailControl->sendMail($validatedData);
            }
            return redirect('/transaksi-baru/detail/'.base64_encode($request->invoice))->with('update-transaksi', "Status pesanan berhasil diupdate.");
            
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi-baru/detail/'.base64_encode($request->invoice))->with('error-update-transaksi', "Silahkan ulangi proses.");
        }
    }
    
    public function transaksi_selesai(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'status' => 'required',
                'email' => 'required',
                'poinReward' => '',
                'cashReward' => '',
                'resi' => '',
                'invoice' => 'required',
                'nama_pelanggan' => 'required',
                'mode' => 'required'
            ]);

            $cekOrder = Transaksi::select('tbl_order_items.id_order', 'tbl_order_items.userlog', 'tbl_order_items.r_poin', 'tbl_order_items.r_wallet', 
            'member.username', 'member.poin', 'member.wallet', 'member.sisa_wallet')
            ->join('member', 'member.username', '=', 'tbl_order_items.userlog')
            ->where('member.username', $request->email)
            ->where('tbl_order_items.userlog', $request->email)
            ->where('tbl_order_items.id_order', $request->invoice)->first();

            // dari tbl_order_items
            $orderPakaiPoin = $cekOrder->r_poin;
            $orderPakaiWallet = $cekOrder->r_wallet;

            // dari tabel member
            $poinMember = $cekOrder->poin;
            $walletMember = $cekOrder->wallet;
            $sisaWalletMember = $cekOrder->sisa_wallet;

            // dari post
            $statusOrder = $request->status;
            $plusPoin = $request->plus_poin;

            $now = Carbon::now();

            $selects1 = array(
                'tbl_order_items.nama_promo AS nmPromo',
                'SUM(tbl_order_items.qty) AS totQty'
            );

            $cekItemPromo = Transaksi::selectRaw(implode(',', $selects1))
            ->where('tbl_order_items.id_order', '=', $request->invoice)
            ->first();

            if($cekItemPromo->nmPromo != "")
            {
                $cekPromoAktif = Promo::where('tbl_promo.nama_promo', '=', $cekItemPromo->nmPromo)->first();
                $min_transaksi = $cekPromoAktif->min_transaksi;
                $cashback = $cekPromoAktif->cashback;
                $stdate = $cekPromoAktif->stdate;
                $nddate = $cekPromoAktif->nddate;
            }
            else
            {
                $cashback = 0;
                $min_transaksi = 0;
            }

            if($sisaWalletMember == 0)
            {
                $penjumlahan1 = $poinMember + $plusPoin;
                $penjumlahan2 = $walletMember + $cashback;
                
                if($cekItemPromo->totQty >= $min_transaksi)
                {
                    Member::where('username', $request->email)
                    ->update([
                        'poin' => $penjumlahan1,
                        'wallet' => $penjumlahan2,
                    ]);
                }
                else
                {
                    Member::where('username', $request->email)
                    ->update([
                        'poin' => $penjumlahan1
                    ]);
                }
                RekapPoinReward::insert([
                    'tgl_dpt_poin' => $now,
                    'user_dpt_poin' => $request->email,
                    'jumlah_poin' => $plusPoin,
                    'jumlah_cashback' => $cashback,
                    'qty_barang' => $cekItemPromo->totQty,
                    'no_trx' => $request->invoice
                ]);
            }
            else
            {
                $penjumlahan1 = $poinMember + $plusPoin;
                $penjumlahan2 = ($walletMember + $cashback) + $sisaWalletMember;
                
                if($cekItemPromo->totQty >= $min_transaksi)
                {
                    Member::where('username', $request->email)
                    ->update([
                        'poin' => $penjumlahan1,
                        'wallet' => $penjumlahan2,
                        'sisa_wallet' => 0
                    ]);
                }
                else
                {
                    Member::where('username', $request->email)
                    ->update([
                        'poin' => $penjumlahan1,
                        'sisa_wallet' => 0
                    ]);
                }

                //insert rekap dapat poin per user
                RekapPoinReward::insert([
                    'tgl_dpt_poin' => $now,
                    'user_dpt_poin' => $request->email,
                    'jumlah_poin' => $plusPoin,
                    'jumlah_cashback' => $cashback,
                    'qty_barang' => $cekItemPromo->totQty,
                    'no_trx' => $request->invoice
                ]);
            }

            
            Transaksi::where('id_order', $request->invoice)
            ->update([
                'status' => $request->status
            ]);

            // send email status selesai
            $this->mailControl->sendMail($validatedData);
            
            $countID = Transaksi::select('id_barang')
            ->where('id_order', $request->invoice)
            ->count();
           
            // add ke ulasan
            $loopProduk = $request->id_produk;
            $loopUserlog = $request->user_log;
            $loopStatusUlasan = $request->status_ulasan;
            $loopNomerTransaksi = $request->nomer_transaksi;
            $loopFotoProduk = $request->foto_produk;
            $loopWipKode = $request->wip_kode;
            $loopWipStokKhusus = $request->wip_stok_khusus;
            $loopWipKategoriStok = $request->wip_kategori_stok;
            $loopWipWarna = $request->wip_warna;
            $loopWipSize = $request->wip_size;
            $loopRating = $request->rating;
            $loopUlasan = $request->ulasan;
            
            if($countID > 1){
                $insertData = [];
                for ($i = 0; $i <= count($loopProduk) - 1 ; $i++) {
                    $data = array(
                        'rating' => $loopRating,
                        'ulasan' => $loopUlasan,
                        'status_ulasan' => $loopStatusUlasan[$i],
                        'user_log' => $loopUserlog,
                        'id_produk' => $loopProduk[$i],
                        'wip_kode' => $loopWipKode[$i],
                        'wip_warna' => $loopWipWarna[$i],
                        'wip_size' => $loopWipSize[$i],
                        'foto_produk' => $loopFotoProduk[$i],
                        'nomer_transaksi' => $loopNomerTransaksi
                    );
                    $insertData[] = $data;
                }
                Ulasan::insert($insertData);

                $data = [
                    'poinReward' => $plusPoin,
                    'cashReward' => $cashback,
                    'email' => $request->email,
                    'resi' => '',
                    'invoice' => $request->invoice,
                    'nama_pelanggan' => $request->nama_pelanggan,
                    'mode' => 'transaksi_reward'
                ];
                $this->mailControl->sendMail($data);
            } else {
                Ulasan::insert([
                    'rating' => $request->rating,
                    'ulasan' => $request->ulasan,
                    'status_ulasan' => $request->status_ulasan2,
                    'user_log' => $request->email,
                    'id_produk' => $request->id_produk2,
                    'wip_kode' => $request->wip_kode2,
                    'wip_warna' => $request->wip_warna2,
                    'wip_size' => $request->wip_size2,
                    'foto_produk' => $request->foto_produk2,
                    'nomer_transaksi' => $request->nomer_transaksi
                ]);
                $data = [
                    'poinReward' => $plusPoin,
                    'cashReward' => $cashback,
                    'email' => $request->email,
                    'resi' => '',
                    'invoice' => $request->invoice,
                    'nama_pelanggan' => $request->nama_pelanggan,
                    'mode' => 'transaksi_reward'
                ];
                $this->mailControl->sendMail($data);
            }
            
            return redirect('/transaksi-baru/detail/'.base64_encode($request->invoice))->with('update-transaksi', "Status pesanan berhasil diupdate.");
            
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi-baru/detail/'.base64_encode($request->invoice))->with('error-update-transaksi', "Silahkan ulangi proses.");
        }
    }

    public function get_data_transaksi($id_order){
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

    public function transaksi_delete(Request $request){
        try{
            // CEK DATA ORDER
            $cekDataInvoice = Transaksi::select('userlog','id_order')
            ->where('id_order', $request->invoice)
            ->first();
            $userLog  = $cekDataInvoice->userlog;
            $idOrder  = $cekDataInvoice->id_order;

            // CEK POIN DAN WALLET USER ORDER
            $cekOrder = Transaksi::select('tbl_order_items.id_order', 'tbl_order_items.userlog', 'tbl_order_items.r_poin', 'tbl_order_items.r_wallet', 
            'member.username', 'member.poin', 'member.wallet')
            ->join('member', 'member.username', '=', 'tbl_order_items.userlog')
            ->where('member.username', $userLog)
            ->where('tbl_order_items.userlog', $userLog)
            ->where('tbl_order_items.id_order', $idOrder)->first();

            // dari tbl_order_items
            $orderPakaiPoin = $cekOrder->r_poin;
            $orderPakaiWallet = $cekOrder->r_wallet;

            // dari tabel member
            $poinMember = $cekOrder->poin;
            $walletMember = $cekOrder->wallet;

            $rPoinPlus = floor($orderPakaiPoin);

			$penjumlahan1 = $poinMember + $rPoinPlus;
			$penjumlahan2 = $walletMember + $orderPakaiWallet;

            $validasi = Transaksi::where('id_order', $request->invoice)
            ->update([
                'status' => 'VOID'
            ]);

            if($validasi){
                // KEMBALIKAN POIN DAN WALLET JIKA DIPAKAI TRANSAKSI, DAN BATAL
                Member::where('username', $userLog)
                ->update([
                    'poin' => $penjumlahan1,
                    'wallet' => $penjumlahan2,
                    'sisa_wallet' => 0,
                ]);

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

                        ProdukDetail::where('ID', $stok->detail_ID)
                        ->where('wip_size', $stok->detail_wip_size)
                        ->update([
                            'wip_stok' => $upStok
                        ]);
                    }
                }
            }
            return redirect('/transaksi-baru/detail/'.base64_encode($request->invoice))->with('void-transaksi', "Pesanan dibatalkan");
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi-baru/detail/'.base64_encode($request->invoice))->with('error-void-transaksi', "Silahkan ulangi proses.");
        }
    }
}