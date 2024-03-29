<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Voucher extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'tbl_voucher';
    protected $primaryKey =  'id_voucher';
    protected $fillable = [
        'kd_voucher',
        'jenis_pelanggan',
        'voucher_val',
        'voucher_persen_rp',
        'status_voucher',
        'batas_pakai'
    ];

    protected $guard_name = 'web';
    public $timestamps = false;
}
