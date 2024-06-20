<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    protected $table = 'saldo';
    public $timestamps = true;

    protected $fillable = [
        'transaksi',
        'detail',
        'user',
        'ket',
        'created_at'
    ];
}
