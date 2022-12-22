<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusKoordinator extends Model
{
    use HasFactory;

    protected $table = 'tbl_bonus_penjualan_koordinator';
    protected $primaryKey = 'ID';
    protected $fillable = [
        'lvl_bonus',
        'jumlah_pasang',
        'jumlah_bonus'
    ];

    public $timestamps = false;
}
