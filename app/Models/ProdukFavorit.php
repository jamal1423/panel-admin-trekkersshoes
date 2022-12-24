<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ProdukFavorit extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'tbl_wishlist';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_wishlist',
        'style_barang',
        'warna_barang',
        'stok_khusus',
        'status_wishlist',
        'userlog',
        'jns_member'
    ];

    public $timestamps = false;
}
