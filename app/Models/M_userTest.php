<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_userTest extends Model
{
    use HasFactory;

    protected $table = 'user_test';

    protected $fillable = [
        'nama',
        'umur',
        'kota',
        'updated_at',
        'created_at'
    ];
}
