<?php

namespace App\Http\Controllers;

use App\Models\BonusKoordinator;
use App\Models\BonusReseller;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    public function data_bonus_pelanggan()
    {
        $bonusKoordinator = BonusKoordinator::all();
        $bonusReseller = BonusReseller::all();
        return view('panel.pages.setting-bonus-pelanggan', [
            'bonusKoordinator' => $bonusKoordinator,
            'bonusReseller' => $bonusReseller
        ]);
    }

    public function get_data_bonus_koordinator($ID){
        $getID = base64_decode($ID);
        $bonusKoordinator = BonusKoordinator::findOrFail($getID);
        return response()->json($bonusKoordinator);
    }
    
    public function get_data_bonus_reseller($ID){
        $getID = base64_decode($ID);
        $bonusReseller = BonusReseller::findOrFail($getID);
        return response()->json($bonusReseller);
    }

    public function bonus_koordinator_update(Request $request){
        try {
            $validatedData = $request->validate([
                'lvl_bonus' => 'required',
                'jumlah_pasang' => 'required',
                'jumlah_bonus' => 'required'
            ]);

            BonusKoordinator::where('ID', $request->id_edit)
                ->update($validatedData);
            return redirect('/setting-bonus-pelanggan')->with('bonus-pelanggan-edit', 'Bonus koordinator telah diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-bonus-pelanggan')->with('bonus-pelanggan-error', 'Error, Ulangi proses!');
        }
    }
    
    public function bonus_reseller_update(Request $request){
        try {
            $validatedData = $request->validate([
                'lvl_bonus' => 'required',
                'jumlah_pasang' => 'required',
                'jumlah_bonus' => 'required'
            ]);

            BonusReseller::where('ID', $request->id_edit)
                ->update($validatedData);
            return redirect('/setting-bonus-pelanggan')->with('bonus-pelanggan-edit', 'Bonus reseller telah diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-bonus-pelanggan')->with('bonus-pelanggan-error', 'Error, Ulangi proses!');
        }
    }
}
