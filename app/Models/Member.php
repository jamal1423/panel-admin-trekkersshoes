<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Member extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'member';
    protected $primaryKey = 'id_member ';
    protected $guarded = [
        'id_member'
    ];

    public $timestamps = false;
}
