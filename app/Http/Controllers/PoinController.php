<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Http\Request;

class PoinController extends Controller
{
    public function data_poin()
    {
        $dataPoin = Poin::all();
        return view('panel.pages.setting-poin', [
            'dataPoin' => $dataPoin
        ]);
    }
    
    public function data_cashback()
    {
        $dataCashback = Poin::all();
        return view('panel.pages.setting-cashback', [
            'dataCashback' => $dataCashback
        ]);
    }
    
    public function data_daily_visit()
    {
        $dataDailyVisit = Poin::all();
        return view('panel.pages.setting-daily-visit', [
            'dataDailyVisit' => $dataDailyVisit
        ]);
    }

    public function data_poin_cashback_update(Request $request){
        try {
            $validatedData = $request->validate([
                'poin_rp' => 'required',
                'poin_pt' => 'required',
                'tkr_poin_pt' => 'required',
                'tkr_poin_rp' => 'required'
            ]);

            Poin::where('id_poin', $request->id_poin)
                ->update($validatedData);
            return redirect('/setting-poin')->with('poin-edit', 'Poin telah diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-poin')->with('poin-error', 'Error, Ulangi proses!');
        }
    }
    
    public function data_cashback_update(Request $request){
        try {
            $validatedData = $request->validate([
                'cashback' => 'required'
            ]);

            Poin::where('id_poin', $request->id_poin)
                ->update($validatedData);
            return redirect('/setting-cashback')->with('cashback-edit', 'Cashback telah diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-cashback')->with('cashback-error', 'Error, Ulangi proses!');
        }
    }
    
    public function data_daily_visit_update(Request $request){
        try {
            $validatedData = $request->validate([
                'daily_visit' => 'required'
            ]);

            Poin::where('id_poin', $request->id_poin)
                ->update($validatedData);
            return redirect('/setting-daily-visit')->with('daily-visit-edit', 'Daily visit telah diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/setting-daily-visit')->with('daily-visit-error', 'Error, Ulangi proses!');
        }
    }
}
