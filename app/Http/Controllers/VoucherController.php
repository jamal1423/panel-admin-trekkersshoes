<?php

namespace App\Http\Controllers;

use App\Models\MasterPelanggan;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function data_voucher()
    {
        $dataVoucher = Voucher::all();
        $masterPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return view('panel.pages.setting-voucher', [
            'dataVoucher' => $dataVoucher,
            'masterPelanggan' => $masterPelanggan
        ]);
    }

    public function data_voucher_tambah(Request $request){
        try {
            $validatedData = $request->validate([
                'kd_voucher' => 'required',
                'voucher_persen_rp' => '',
                'voucher_val' => 'required',
                'jenis_pelanggan' => 'required',
                'status_voucher' => 'required',
                'batas_pakai' => 'required'
            ]);

            if($request->voucher_persen_rp==""){
                $validatedData['voucher_persen_rp'] = "N";
            }

            Voucher::create($validatedData);
            return redirect('/setting-voucher')->with('voucher-tambah', 'Sukses, Data berhasil ditambahkan!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-voucher')->with('admin-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_voucher($id_voucher){
        $getVoucher = base64_decode($id_voucher);
        $dataVoucher = Voucher::findOrFail($getVoucher);
        $masterPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return response()->json([
            'dataVoucher' => $dataVoucher,
            'masterPelanggan' => $masterPelanggan
        ]);
    }

    public function data_voucher_edit(Request $request){
        try {
            $validatedData = $request->validate([
                'kd_voucher' => 'required',
                'voucher_persen_rp' => '',
                'voucher_val' => 'required',
                'jenis_pelanggan' => 'required',
                'status_voucher' => 'required',
                'batas_pakai' => 'required'
            ]);

            if($request->voucher_persen_rp==""){
                $validatedData['voucher_persen_rp'] = "N";
            }

            Voucher::where('id_voucher', $request->id_voucher)
                ->update($validatedData);
            return redirect('/setting-voucher')->with('voucher-edit', 'Sukses, Voucher berhasil diupdate!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-voucher')->with('voucher-error', 'Error, Ulangi proses!');
        }
    }
    
    public function data_voucher_delete(Request $request){
        try {
            Voucher::destroy($request->id_voucher);
            return redirect('/setting-voucher')->with('voucher-delete', 'Sukses, Voucher berhasil dihapus!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-voucher')->with('voucher-error', 'Error, Ulangi proses!');
        }
    }
}
