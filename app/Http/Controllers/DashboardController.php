<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function halaman_dashboard()
    {
        return view('panel.pages.dashboard');
    }
}
