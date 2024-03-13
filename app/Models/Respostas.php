<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respostas extends Model
{
    use HasFactory;

    public function relatorios()
    {
        return $this->hasMany(Relatorios::class);
    }
    public function pergunta()
    {
        return $this->belongsTo(Perguntas::class);
    }
}
