<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Produk extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'tbl_produk';
    protected $primaryKey = 'ID';
    protected $guarded = [
        'ID'
    ];

    public $timestamps = false;
}
