<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function halaman_dashboard()
    {   
        try{
            $dataJenisMember = Member::distinct('jns_member')
            ->where('jns_member','<>','')
            ->where('userStatus','=','Y')
            ->groupBy('jns_member')
            ->get();
            return view('panel.pages.dashboard',[
                'dataJenisMember' => $dataJenisMember
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/')->with('dashboard-error', 'Error, Ulangi proses!');
        }
    }
}
