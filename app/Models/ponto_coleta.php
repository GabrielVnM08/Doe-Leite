<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ponto_coleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'fone',
        'endereco',
        'documento'
    ];

    protected $table = 'ponto_coletas';
}
