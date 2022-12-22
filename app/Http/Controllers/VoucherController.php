<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function data_voucher()
    {
        $dataVoucher = Voucher::all();
        return view('panel.pages.setting-voucher', [
            'dataVoucher' => $dataVoucher
        ]);
    }
}
