<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Ulasan extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'tbl_ulasan';
    protected $primaryKey = 'id_ulasan';

    protected $fillable = [
        'rating',
        'ulasan',
        'status_ulasan',
        'user_log',
        'id_produk',
        'wip_kode',
        'wip_warna',
        'wip_size',
        'foto_produk',
        'nomer_transaksi'
    ];

    public $timestamps = false;
}
