<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_ponto',
        'nome_ponto',
        'data_doacao',
        'quantidade',
        'nome_doadora'
    ];

    protected $table = 'doacaos';
    
}
