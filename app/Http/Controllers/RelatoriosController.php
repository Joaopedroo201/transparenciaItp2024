<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Perguntas;
use App\Models\Respostas;
use App\Models\Categorias;

class RelatoriosController extends Controller
{
    public function index()
    {
        return view('relatorios.index');
    }

    public function create()
    {
        $tempo = date('Y-m-d H:i:s');
        $clientes = Clientes::all();
        $categorias = Categorias::all();
        $hash = strtotime($tempo);

        return view('relatorios.create', ['clientes' => $clientes, 'clientes' => $clientes, 'categorias' => $categorias, 'hash' => $hash]);
    }
}
