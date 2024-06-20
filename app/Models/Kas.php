<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;
    protected $table = 'kas';
    public $timestamps = true;

    protected $fillable = [
        'kas_masuk',
        'kas_keluar',
        'saldo',
        'detail',
        'created_at'
    ];
}
