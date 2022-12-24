<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Slider extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'tbl_setting_slider';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'gambar'
    ];

    protected $guard_name = 'web';
    public $timestamps = false;
}
