<?php

namespace App\Http\Controllers;

use App\Models\MasterPelanggan;
use App\Models\Produk;
use App\Models\PromoBarang;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function data_promo_barang()
    {
        $dataPromo = PromoBarang::all();
        $dataProduk = Produk::select('wip_kode')
        ->where('wip_kode','<>','')
        ->where('wip_stok_khusus','=',0)
        ->get();
        $masterPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return view('panel.pages.setting-promo-barang', [
            'dataPromo' => $dataPromo,
            'dataProduk' => $dataProduk,
            'masterPelanggan' => $masterPelanggan
        ]);
    }

    public function get_promo_barang($id){
        $getID = base64_decode($id);
        $dataPromo = PromoBarang::findOrFail($getID);
        $dataProduk = Produk::select('wip_kode')
        ->where('wip_kode','<>','')
        ->where('wip_stok_khusus','=',0)
        ->get();
        $masterPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return response()->json([
            'dataPromo'=> $dataPromo,
            'dataProduk'=> $dataProduk,
            'masterPelanggan' => $masterPelanggan
        ]);
    }

    public function promo_barang_tambah(Request $request){
        try {
            $validatedData = $request->validate([
                'nama_promo' => 'required',
                'master_barang' => 'required',
                'group_pelanggan' => 'required',
                'harga_promo' => 'required',
                'disc_label' => '',
                'disc_value' => 'required',
                'cashback' => 'required',
                'min_transaksi' => 'required',
                'stdate' => 'required',
                'nddate' => 'required'
            ]);
            if($request->disc_label==""){
                $validatedData['disc_label'] = "N";
            }
            
            $validatedData['master_barang'] = implode (",", $request->master_barang);
            $validatedData['group_pelanggan'] = implode (",", $request->group_pelanggan);
            PromoBarang::create($validatedData);
            return redirect('/setting-promo-barang')->with('promo-tambah', 'Sukses, Promo berhasil ditambahkan!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-promo-barang')->with('promo-error', 'Error, Ulangi proses!');
        }
    }
    
    public function promo_barang_update(Request $request){
        try {
            $validatedData = $request->validate([
                'nama_promo' => '',
                'master_barang' => '',
                'group_pelanggan' => '',
                'harga_promo' => '',
                'disc_label' => '',
                'disc_value' => '',
                'cashback' => '',
                'min_transaksi' => '',
                'stdate' => '',
                'nddate' => ''
            ]);
            if($request->disc_label==""){
                $validatedData['disc_label'] = "N";
            }
            
            $validatedData['master_barang'] = implode (",", $request->master_barang);
            $validatedData['group_pelanggan'] = implode (",", $request->group_pelanggan);
            
            PromoBarang::where('id', $request->id_edit)
                ->update($validatedData);
            return redirect('/setting-promo-barang')->with('promo-edit', 'Sukses, Promo berhasil diupdate!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-promo-barang')->with('promo-error', 'Error, Ulangi proses!');
        }
    }
}
