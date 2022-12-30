<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function data_slider()
    {
        try {            
            $dataSlider = Slider::all();
            // $baseUrlImage = "https://panel.trekkersshoes.com/images/slider/";
            $baseUrlImage = "https://trekkersshoes.com/assets/img/slider/";
            return view('panel.pages.setting-slider', [
                'dataSlider' => $dataSlider,
                'baseUrlImage' => $baseUrlImage
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-slider')->with('slider-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_slider($id){
        $getID = base64_decode($id);
        $dataSlider = Slider::findOrFail($getID);
        return response()->json($dataSlider);
    }
    
    public function data_slider_tambah(Request $request)
    {
        // try {
        //     $validatedData = $request->validate([
        //         'nama' => 'required',
        //         'gambar' => 'required',
        //     ]);

        //     if ($request->hasFile('gambar')) {
        //         $image = $request->file('gambar');
        //         $name = "slider-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
        //         $image->move(public_path() . '/slider/', $name);
        //         $validatedData['gambar'] = $name;
        //     }

        //     Slider::create($validatedData);
        //     return redirect('/setting-slider')->with('slider-tambah', 'Slider baru berhasil ditambahkan!');
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return redirect('/setting-slider')->with('slider-error', 'Error, Ulangi proses!');
        // }
        
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'gambar' => 'required',
            ]);

            if($request->hasFile('gambar')) {
                $filenamewithextension = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_slider')->put($filenametostore, fopen($request->file('gambar'), 'r+'));
                $validatedData['gambar'] = $filenametostore;
            }

            Slider::create($validatedData);
            return redirect('/setting-slider')->with('slider-tambah', 'Slider baru berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-slider')->with('slider-error', 'Error, Ulangi proses!');
        }

        // PAKAI FTP
        // if($request->hasFile('gambar')) {
        //     $filenamewithextension = $request->file('gambar')->getClientOriginalName();
        //     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        //     $extension = $request->file('gambar')->getClientOriginalExtension();
        //     $filenametostore = $filename.'_'.uniqid().'.'.$extension;
        //     // Storage::disk('ftp_slider')->put($filenametostore, fopen($request->file('gambar'), 'r+'));
        //     Storage::disk('ftp_produk')->put($filenametostore, fopen($request->file('gambar'), 'r+'));
        //     Storage::disk('ftp_produk_detail')->put($filenametostore, fopen($request->file('gambar'), 'r+'));
        // }
        // return redirect('/setting-slider')->with('slider-tambah', 'Slider baru berhasil ditambahkan!');
    }

    public function data_slider_update(Request $request){
        try {
            $validatedData = $request->validate([
                'gambar' => ''
            ]);

            // dd([$validatedData, $request->oldImage]);

            if ($request->hasFile('gambar')) {
                
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    // $image_path = public_path() . '/slider/' . $gmbr;
                    // if (File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }

                    Storage::disk('ftp_slider')->delete($gmbr);
                }

                // $image = $request->file('gambar');
                // $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                // $image->move(public_path() . '/slider/', $name);
                // $validatedData['gambar'] = $name;

                $filenamewithextension = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::disk('ftp_slider')->put($filenametostore, fopen($request->file('gambar'), 'r+'));
                $validatedData['gambar'] = $filenametostore;
            }

            Slider::where('id', $request->id_edit)
                ->update($validatedData);
            return redirect('/setting-slider')->with('slider-edit', 'Slider telah diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-slider')->with('slider-error', 'Error, Ulangi proses!');
        }
    }

    public function data_slider_delete(Request $request){
        try {
            $gmbr = $request->oldImage;
            // $image_path = public_path() . '/slider/' . $gmbr;
            // if (File::exists($image_path)) {
            //     File::delete($image_path);
            // }

            Storage::disk('ftp_slider')->delete($gmbr);

            Slider::destroy($request->id);
            return redirect('/setting-slider')->with('slider-delete', 'Slider telah dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-slider')->with('slider-error', 'Error, Ulangi proses!');
        }
    }
}