<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorios extends Model
{
    use HasFactory;

    public function respostas()
    {
        return $this->belongsTo(Respostas::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
