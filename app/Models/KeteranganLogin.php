<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganLogin extends Model
{
    use HasFactory;

    protected $table = 'tblKeteranganLogin';
    public $timestamps = false;

    protected $fillable = [
        'id_login',
        'date_time_login',
        'date_time_logout',
        'username',
    ];
}
