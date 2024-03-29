<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class MasterPelanggan extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'tbl_master_pelanggan';
    protected $primaryKey = 'pelanggan_id';
    protected $guarded = [
        'pelanggan_id'
    ];

    public $timestamps = false;
}
