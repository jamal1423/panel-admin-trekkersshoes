<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    protected $table = 'tbl_poin';
    protected $primaryKey = 'id_poin';

    protected $fillable = [
        'poin_rp',
        'poin_pt',
        'tkr_poin_pt',
        'tkr_poin_rp',
        'cashback',
        'reg',
        'daily_visit'
    ];

    public $timestamps = false;
}
