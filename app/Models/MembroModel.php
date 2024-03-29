<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembroModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'PrimeiroNome',
        'Matricula',
        'Funcao',
    ];
}
