<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'tblfaq';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'username',
    ];
}
