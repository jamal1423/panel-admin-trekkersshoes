<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogLogin extends Model
{
    use HasFactory;

    protected $table = 'tbl_log_login';
    protected $primaryKey = 'id_log';
    protected $fillable = [
        'userName',
        'jns_member',
        'tgl_login'
    ];

    public $timestamps = false;
}
