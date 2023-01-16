<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\MasterPelanggan;
use App\Models\ModelHasRole;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function admin_trekkers()
    {
        $dataAdmin = User::all();
        $dataGroupPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return view('panel.pages.admin-trekkers', [
            'dataAdmin' => $dataAdmin,
            'dataGroupPelanggan' => $dataGroupPelanggan
        ]);
    }

    public function profil(){
        try{
            return view('panel.pages.profil');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard')->with('profil-error', 'Error, Ulangi proses!');
        }
    }

    public function profil_update(Request $request){
        try {
            if($request->password){
                $validatedData = $request->validate([
                    'username' => 'required',
                    'nama' => 'required',
                    'password' => ['required', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
                    'hak_akses' => 'required',
                    'adm_mitra' => ''
                ]);
                $validatedData['password'] = bcrypt($validatedData['password']);

                User::where('user_id', $request->user_id)
                ->update($validatedData);
            } else {
                $validatedData = $request->validate([
                    'username' => 'required',
                    'nama' => 'required',
                    'password' => '',
                    'hak_akses' => 'required',
                    'adm_mitra' => ''
                ]);
                
                User::where('user_id', $request->user_id)
                ->update($validatedData);
            }
            
            return redirect('/profil')->with('profil-edit', 'Sukses, Data berhasil diupdate!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/profil')->with('profil-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_profil($user_id){
        $getUser = base64_decode($user_id);
        // $dataAdmin = User::where('user_id', $getUser)->first();
        $dataAdmin = User::findOrFail($getUser);
        return response()->json([
            'dataAdmin' => $dataAdmin,
        ]);
    }

    public function get_data_admin($user_id){
        try{
            $getUser = base64_decode($user_id);
            $dataAdmin = User::where('user_id', $getUser)->first();
            $masterPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
            return response()->json([
                'dataAdmin' => $dataAdmin,
                'masterPelanggan' => $masterPelanggan
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

    public function admin_trekkers_tambah(Request $request){
        try{
            $validatedData = $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'password' => ['required', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
                'hak_akses' => 'required',
                'adm_mitra' => '',
                'foto' => '',
            ]);
            $cekExist = User::where('username','=',$request->username)->count();
            if($cekExist > 0){
                return redirect('/admin-trekkers')->with('admin-exist', 'User sudah terdaftar');
            } else {
                $validatedData['password'] = bcrypt($validatedData['password']);
                // User::create($validatedData);
                if($request->hak_akses == "Administrator"){
                    $admin = User::create($validatedData);
                    $admin->assignRole('Administrator');
                }
                if($request->hak_akses == "WebAdmin"){
                    $admin = User::create($validatedData);
                    $admin->assignRole('WebAdmin');
                }
                if($request->hak_akses == "KoordinatorReseller"){
                    $admin = User::create($validatedData);
                    $admin->assignRole('KoordinatorReseller');
                }
                if($request->hak_akses == "GudangJadi"){
                    $admin = User::create($validatedData);
                    $admin->assignRole('GudangJadi');
                }
                return redirect('/admin-trekkers')->with('admin-tambah', 'User baru berhasil ditambahkan');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/admin-trekkers')->with('admin-error', 'Error, Ulangi proses!');
        }
    }

    public function admin_trekkers_edit(Request $request){
        try {
            $validatedData = $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'hak_akses' => 'required',
                'adm_mitra' => ''
            ]);

            $cekRole = Role::where('name','=',$request->hak_akses)->get();
            
            foreach($cekRole as $role){
                $idRole = $role->id;
            }

            $cekHasRole = ModelHasRole::where('model_id','=', $request->idEdit)->count();
            if($cekHasRole > 0){
                ModelHasRole::where('model_id', $request->idEdit)
                ->update([
                    'role_id' => $idRole
                ]);
            }else{
                ModelHasRole::create([
                    'role_id' => $idRole,
                    'model_type' => 'App\Models\User',
                    'model_id' => $request->idEdit,
                ]);
            }

            User::where('user_id', $request->idEdit)
                ->update($validatedData);
            return redirect('/admin-trekkers')->with('admin-edit', 'Sukses, Data berhasil diupdate!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/admin-trekkers')->with('admin-error', 'Error, Ulangi proses!');
        }
    }
    
    public function admin_trekkers_delete(Request $request){
        try {
            User::destroy($request->id);
            ModelHasRole::where('model_id','=',$request->id)->delete();
            return redirect('/admin-trekkers')->with('admin-delete', 'Sukses, Data berhasil dihapus!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/admin-trekkers')->with('admin-error', 'Error, Ulangi proses!');
        }
    }
    
    public function admin_trekkers_reset_pass(Request $request){
        try {
            $validatedData = $request->validate([
                'password' => ['required', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/']
            ]);
            if($validatedData){
                $validatedData['password'] = bcrypt($validatedData['password']);
                User::where('user_id', $request->idReset)
                    ->update($validatedData);
                return redirect('/admin-trekkers')->with('admin-reset-pass', 'Sukses, Password berhasil direset!'); 
            } else {
                return redirect('/admin-trekkers')->with('failed-reset-pass', 'Error, Format password salah!'); 
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/admin-trekkers')->with('admin-error', 'Error, Ulangi proses!');
        }
    }
}
