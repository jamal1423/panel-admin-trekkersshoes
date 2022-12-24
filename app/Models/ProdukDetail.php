<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ProdukDetail extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'tbl_produk_detail';
    protected $primaryKey = 'ID';
    protected $fillable = [
        'wip_tgl_sync',
        'wip_userlog',
        'wip_kode',
        'wip_kategori',
        'wip_size',
        'wip_stok'
    ];

    public $timestamps = false;
}
