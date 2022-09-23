<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'no_kp', 'telefon', 'catatan', 'code', 'is_verified',
    ];
}
