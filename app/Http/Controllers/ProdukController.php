<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function halaman_produk()
    {
        $dataProduk = Produk::select('ID','wip_kode','wip_warna','jenis','tipe_produk','nama_group','foto_produk')
        ->where('wip_kode','<>','')
        ->orderBy('wip_kode')
        ->get();
        // dd($dataProduk);
        return view('panel.pages.produk',[
            'dataProduk' => $dataProduk
        ]);
    }
    
    public function halaman_produk_baru()
    {
        $dataProdukBaru = Produk::where('wip_kode','<>','')
        ->where('produk_baru','=','Produk Baru')
        ->orderBy('nama')
        ->get();
        // dd($dataProdukBaru);
        return view('panel.pages.produk-baru',[
            'dataProdukBaru' => $dataProdukBaru
        ]);
    }
    
    public function halaman_produk_populer()
    {
        $dataProdukPopuler = Produk::where('wip_kode','<>','')
        ->where('produk_populer','=','Produk Populer')
        ->orderBy('nama')
        ->get();
        return view('panel.pages.produk-populer',[
            'dataProdukPopuler' => $dataProdukPopuler
        ]);
    }
    
    public function halaman_produk_detail($id)
    {
        $produkDetail = Produk::where('ID','=',base64_decode($id))->get();
        // dd($produkDetail);
        $dataGroup = Group::all();
        return view('panel.pages.produk-detail',[
            'produkDetail' => $produkDetail,
            'dataGroup' => $dataGroup,
        ]);
    }
    
    public function halaman_produk_update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'kd_brg' => '',
                'nama' => '',
                'deskripsi' => '',
                'tipe_produk' => '',
                'nama_group' => '',
                'produk_baru' => '',
                'produk_populer' => '',
                'berat' => '',
                'foto_produk' => '',
                'foto_produk_detail1' => '',
                'foto_produk_detail2' => '',
                'foto_produk_detail3' => '',
                'foto_produk_detail4' => '',
                'foto_produk_detail5' => '',
                'foto_produk_detail6' => '',
                'foto_produk_detail7' => '',
                'foto_produk_detail8' => '',
            ]);

            if ($request->hasFile('foto_produk_detail1')) {
                if ($request->oldImageDetail1) {
                    $gmbr = $request->oldImage;
                    $gmbr2 = $request->oldImageDetail1;
                    
                    $image_path = public_path() . '/produk/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    
                    $image_path2 = public_path() . '/produk-detail/' . $gmbr2;
                    if (File::exists($image_path2)) {
                        File::delete($image_path2);
                    }
                }

                $image = $request->file('foto_produk_detail1');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk/', $name);
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail1'] = $name;
                $validatedData['foto_produk'] = $name;
            }
            
            if ($request->hasFile('foto_produk_detail2')) {
                if ($request->oldImageDetail2) {
                    $gmbr = $request->oldImageDetail2;

                    $image_path = public_path() . '/produk-detail/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto_produk_detail2');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail2'] = $name;
            }
            
            if ($request->hasFile('foto_produk_detail3')) {
                if ($request->oldImageDetail3) {
                    $gmbr = $request->oldImageDetail3;

                    $image_path = public_path() . '/produk-detail/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto_produk_detail3');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail3'] = $name;
            }
            
            if ($request->hasFile('foto_produk_detail4')) {
                if ($request->oldImageDetail4) {
                    $gmbr = $request->oldImageDetail4;

                    $image_path = public_path() . '/produk-detail/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto_produk_detail4');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail4'] = $name;
            }
            
            if ($request->hasFile('foto_produk_detail5')) {
                if ($request->oldImageDetail5) {
                    $gmbr = $request->oldImageDetail5;

                    $image_path = public_path() . '/produk-detail/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto_produk_detail5');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail5'] = $name;
            }
            
            if ($request->hasFile('foto_produk_detail6')) {
                if ($request->oldImageDetail6) {
                    $gmbr = $request->oldImageDetail6;

                    $image_path = public_path() . '/produk-detail/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto_produk_detail6');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail6'] = $name;
            }
            
            if ($request->hasFile('foto_produk_detail7')) {
                if ($request->oldImageDetail7) {
                    $gmbr = $request->oldImageDetail7;

                    $image_path = public_path() . '/produk-detail/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto_produk_detail7');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail7'] = $name;
            }
            
            if ($request->hasFile('foto_produk_detail8')) {
                if ($request->oldImageDetail8) {
                    $gmbr = $request->oldImageDetail8;

                    $image_path = public_path() . '/produk-detail/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto_produk_detail8');
                $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/produk-detail/', $name);
                $validatedData['foto_produk_detail8'] = $name;
            }

            Produk::where('ID', $request->ID)
                ->update($validatedData);
            return redirect('/produk/detail/'.base64_encode($request->ID))->with('produk-edit', 'Produk berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/produk/detail/'.base64_encode($request->ID))->with('produk-error', 'Error, Ulangi proses!');
        }
    }
}
