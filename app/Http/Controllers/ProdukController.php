<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function halaman_produk(Request $request)
    {
        try{
            if($request->artikel){
                $dataProduk = Produk::where('wip_kode', 'like', '%' . $request->artikel . '%')->get();
                $singleProduk = "yes";
            } else {
                $dataProduk = Produk::orderByRaw("CASE WHEN foto_produk='' THEN foto_produk='' END DESC")
                ->orderBy('wip_kode')->paginate(20);
                $singleProduk = "no";
            }
            
            $baseUrlImage = "https://cloud.widayaintiplasma.com/trekkers/produk/";
            return view('panel.pages.produk',[
                'dataProduk' => $dataProduk,
                'baseUrlImage' => $baseUrlImage,
                'singleProduk' => $singleProduk
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/produk-all')->with('produk-error', 'Error, Ulangi proses!');
        }
    }
    
    public function halaman_produk_baru(Request $request)
    {
        try{
            if($request->artikel){
                $dataProdukBaru = Produk::where('wip_kode', 'like', '%' . $request->artikel . '%')
                ->where('produk_baru','=','Produk Baru')
                ->get();
                $singleProduk = "yes";
            } else {
                $dataProdukBaru = Produk::where('wip_kode','<>','')
                ->where('produk_baru','=','Produk Baru')
                ->orderBy('nama')
                ->paginate(20);
                $singleProduk = "no";
            }

            $baseUrlImage = "https://cloud.widayaintiplasma.com/trekkers/produk/";
            return view('panel.pages.produk-baru',[
                'dataProdukBaru' => $dataProdukBaru,
                'baseUrlImage' => $baseUrlImage,
                'singleProduk' => $singleProduk
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/produk-baru')->with('produk-error', 'Error, Ulangi proses!');
        }
    }
    
    public function halaman_produk_populer(Request $request)
    {
        try{
            if($request->artikel){
                $dataProdukPopuler = Produk::where('wip_kode', 'like', '%' . $request->artikel . '%')
                ->where('produk_populer','=','Produk Populer')
                ->get();
                $singleProduk = "yes";
            } else {
                $dataProdukPopuler = Produk::where('wip_kode','<>','')
                ->where('produk_populer','=','Produk Populer')
                ->orderBy('nama')
                ->paginate(20);
                $singleProduk = "no";
            }
            $baseUrlImage = "https://cloud.widayaintiplasma.com/trekkers/produk/";
            return view('panel.pages.produk-populer',[
                'dataProdukPopuler' => $dataProdukPopuler,
                'baseUrlImage' => $baseUrlImage,
                'singleProduk' => $singleProduk
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/produk-baru')->with('produk-error', 'Error, Ulangi proses!');
        }
    }
    
    public function halaman_produk_detail($id)
    {
        $produkDetail = Produk::where('ID','=',base64_decode($id))->get();
        // dd($produkDetail);
        $dataGroup = Group::all();
        // $baseUrlImage = "https://trekkersshoes.com/assets/img/produk-detail/";
        $baseUrlImage = "https://cloud.widayaintiplasma.com/trekkers/produk-detail/";
        return view('panel.pages.produk-detail',[
            'produkDetail' => $produkDetail,
            'dataGroup' => $dataGroup,
            'baseUrlImage' => $baseUrlImage
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
                    
                    // ini pakai storage local
                    // $image_path = public_path() . '/produk/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }
                    
                    // $image_path2 = public_path() . '/produk-detail/' . $gmbr2;
                    // if (File::exists($image_path2)) {
                    //     File::delete($image_path2);
                    // }

                    Storage::disk('ftp_produk')->delete($gmbr);
                    Storage::disk('ftp_produk_detail')->delete($gmbr2);
                }

                // ini pakai storage local
                // $image = $request->file('foto_produk_detail1');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk/', $name);
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail1'] = $name;
                // $validatedData['foto_produk'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail1')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail1')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk')->put($filenametostore, fopen($request->file('foto_produk_detail1'), 'r+'));
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail1'), 'r+'));
                $validatedData['foto_produk'] = $filenametostore;
                $validatedData['foto_produk_detail1'] = $filenametostore;
            }
            
            if ($request->hasFile('foto_produk_detail2')) {
                if ($request->oldImageDetail2) {
                    $gmbr = $request->oldImageDetail2;

                    // storage local
                    // $image_path = public_path() . '/produk-detail/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }

                    Storage::disk('ftp_produk_detail')->delete($gmbr);
                }

                // $image = $request->file('foto_produk_detail2');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail2'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail2')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail2')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail2'), 'r+'));
                $validatedData['foto_produk_detail2'] = $filenametostore;
            }
            
            if ($request->hasFile('foto_produk_detail3')) {
                if ($request->oldImageDetail3) {
                    $gmbr = $request->oldImageDetail3;

                    // $image_path = public_path() . '/produk-detail/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }
                    Storage::disk('ftp_produk_detail')->delete($gmbr);
                }

                // $image = $request->file('foto_produk_detail3');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail3'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail3')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail3')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail3'), 'r+'));
                $validatedData['foto_produk_detail3'] = $filenametostore;
            }
            
            if ($request->hasFile('foto_produk_detail4')) {
                if ($request->oldImageDetail4) {
                    $gmbr = $request->oldImageDetail4;

                    // $image_path = public_path() . '/produk-detail/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }
                    Storage::disk('ftp_produk_detail')->delete($gmbr);
                }

                // $image = $request->file('foto_produk_detail4');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail4'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail4')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail4')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail4'), 'r+'));
                $validatedData['foto_produk_detail4'] = $filenametostore;
            }
            
            if ($request->hasFile('foto_produk_detail5')) {
                if ($request->oldImageDetail5) {
                    $gmbr = $request->oldImageDetail5;

                    // $image_path = public_path() . '/produk-detail/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }

                    Storage::disk('ftp_produk_detail')->delete($gmbr);
                }

                // $image = $request->file('foto_produk_detail5');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail5'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail5')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail5')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail5'), 'r+'));
                $validatedData['foto_produk_detail5'] = $filenametostore;
            }
            
            if ($request->hasFile('foto_produk_detail6')) {
                if ($request->oldImageDetail6) {
                    $gmbr = $request->oldImageDetail6;

                    // $image_path = public_path() . '/produk-detail/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }

                    Storage::disk('ftp_produk_detail')->delete($gmbr);
                }

                // $image = $request->file('foto_produk_detail6');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail6'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail6')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail6')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail6'), 'r+'));
                $validatedData['foto_produk_detail6'] = $filenametostore;
            }
            
            if ($request->hasFile('foto_produk_detail7')) {
                if ($request->oldImageDetail7) {
                    $gmbr = $request->oldImageDetail7;

                    // $image_path = public_path() . '/produk-detail/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }

                    Storage::disk('ftp_produk_detail')->delete($gmbr);
                }

                // $image = $request->file('foto_produk_detail7');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail7'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail7')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail7')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail7'), 'r+'));
                $validatedData['foto_produk_detail7'] = $filenametostore;
            }
            
            if ($request->hasFile('foto_produk_detail8')) {
                if ($request->oldImageDetail8) {
                    $gmbr = $request->oldImageDetail8;

                    // $image_path = public_path() . '/produk-detail/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }
                    Storage::disk('ftp_produk_detail')->delete($gmbr);
                }

                // $image = $request->file('foto_produk_detail8');
                // $name = "trekkers-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/produk-detail/', $name);
                // $validatedData['foto_produk_detail8'] = $name;

                $filenamewithextension = $request->file('foto_produk_detail8')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('foto_produk_detail8')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('foto_produk_detail8'), 'r+'));
                $validatedData['foto_produk_detail8'] = $filenametostore;
            }

            Produk::where('ID', $request->ID)
                ->update($validatedData);
            return redirect('/produk/detail/'.base64_encode($request->ID))->with('produk-edit', 'Produk berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/produk/detail/'.base64_encode($request->ID))->with('produk-error', 'Error, Ulangi proses!');
        }
    }
}
