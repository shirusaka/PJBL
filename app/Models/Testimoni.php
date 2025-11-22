<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'tbltesti';
    protected $fillable = [
        'username',
        'foto_ss',
    ];
}
