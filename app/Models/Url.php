<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Url extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'tbl_url_sosmed';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_sosmed',
        'url'
    ];

    public $timestamps = false;
}
