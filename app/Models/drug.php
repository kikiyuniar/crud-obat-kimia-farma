<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id')->withDefault();
    }
}
