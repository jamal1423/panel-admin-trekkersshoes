<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'tbl_setting_slider';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'gambar'
    ];

    public $timestamps = false;
}
