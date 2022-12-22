<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function data_url()
    {
        $dataUrl = Url::all();
        return view('panel.pages.setting-url-sosmed', [
            'dataUrl' => $dataUrl
        ]);
    }

    public function data_url_tambah(Request $request){
        try {
            $validatedData = $request->validate([
                'nama_sosmed' => 'required',
                'url' => 'required'
            ]);
            Url::create($validatedData);
            return redirect('/setting-url-sosmed')->with('url-tambah', 'Sukses, Url berhasil ditambahkan!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-url-sosmed')->with('url-error', 'Error, Ulangi proses!');
        }
    }
    
    public function data_url_update(Request $request){
        try {
            $validatedData = $request->validate([
                'nama_sosmed' => 'required',
                'url' => 'required'
            ]);
            Url::where('id',$request->id)
            ->update($validatedData);
            return redirect('/setting-url-sosmed')->with('url-edit', 'Sukses, Url berhasil diupdate!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-url-sosmed')->with('url-error', 'Error, Ulangi proses!');
        }
    }
    
    public function data_url_delete(Request $request){
        try {
            Url::destroy($request->id);
            return redirect('/setting-url-sosmed')->with('url-delete', 'Sukses, Url berhasil dihapus!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-url-sosmed')->with('url-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_url($id){
        $getID = base64_decode($id);
        $dataUrl = Url::findOrFail($getID);
        return response()->json($dataUrl);
    }
}
