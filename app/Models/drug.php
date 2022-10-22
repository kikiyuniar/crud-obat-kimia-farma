<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drug extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_obat',
        'id_user',
        'images_obat',
        'tgl_dibuat',
        'tgl_kadaluarsa'
    ];
}
