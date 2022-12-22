<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoBarang extends Model
{
    use HasFactory;
    protected $table = 'tbl_promo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_promo',
        'master_barang',
        'group_pelanggan',
        'harga_promo',
        'disc_label',
        'disc_value',
        'cashback',
        'min_transaksi',
        'stdate',
        'nddate'
    ];

    public $timestamps = false;
}
