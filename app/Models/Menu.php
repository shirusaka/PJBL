<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'tblmenu';

    protected $fillable = [
        'nama_menu',
        'harga',
        'deskripsi',
        'promo',
        'gambar',
        'username',
    ];
}
