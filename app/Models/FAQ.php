<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'tblfaq';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'username',
    ];
}
