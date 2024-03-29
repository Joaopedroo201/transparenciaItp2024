<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    use HasFactory;

    public function respostas()
    {
        return $this->hasMany(Respostas::class);
    }
}
