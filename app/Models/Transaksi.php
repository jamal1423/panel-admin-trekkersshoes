<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_items';
    protected $primaryKey = 'id_order_items';
    protected $guarded = [
        'id_order_items'
    ];

    public $timestamps = false;
}
