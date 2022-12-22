<?php

namespace App\Http\Controllers;

use App\Models\MasterPelanggan;
use Illuminate\Http\Request;

class GroupPelangganController extends Controller
{
    public function data_group_pelanggan()
    {
        $dataGroupPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return view('panel.pages.setting-group-pelanggan', [
            'dataGroupPelanggan' => $dataGroupPelanggan
        ]);
    }

    public function data_group_pelanggan_tambah(Request $request){
        try{
            $validatedData = $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'password' => ['required', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
                'hak_akses' => 'required',
                'adm_mitra' => '',
                'foto' => '',
            ]);
            $validatedData['password'] = bcrypt($validatedData['password']);

        } catch (\Illuminate\Database\QueryException $e) {

        }
    }

    public function get_data_group_pelanggan(){
        try{
            $status = 200;
            $message = "OK";
            $dataGroupPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
            return response()->json([
                'status' => $status,
                'message' => $message,
                'result' => $dataGroupPelanggan
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
}