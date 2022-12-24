<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Group extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'tbl_group';
    protected $primaryKey = 'id_group';
    protected $fillable = [
        'nama_group'
    ];

    public $timestamps = false;
}
