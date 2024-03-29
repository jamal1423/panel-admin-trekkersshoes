<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class RekapPoinReward extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'tbl_dapat_poin_reward';
    protected $primaryKey = 'id_poin';
    protected $fillable = [
        'tgl_dpt_poin',
        'user_dpt_poin',
        'jumlah_poin',
        'jumlah_cashback',
        'qty_barang',
        'no_trx'
    ];

    public $timestamps = false;
}
