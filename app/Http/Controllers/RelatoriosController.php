<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Perguntas;
use App\Models\Respostas;
use App\Models\Categorias;
use App\Models\Relatorios;
use Illuminate\Support\Facades\DB;

class RelatoriosController extends Controller
{
    public function index()
    {
        $relatorios = Relatorios::all();
        return view('relatorios.index', ['relatorios' => $relatorios]);
    }

    public function create()
    {
        $tempo = date('Y-m-d H:i:s');
        $clientesP = Clientes::where('tipo', 'P')->get();
        $perguntasP = Perguntas::where('tipo', 'P')->get();
        $clientesC = Clientes::where('tipo', 'C')->get();
        $perguntasC= Perguntas::where('tipo', 'C')->get();
        $categoriasP = Categorias::where('tipo', 'P')->get();
        $categoriasC = Categorias::where('tipo', 'C')->get();
        $hash = strtotime($tempo);

        return view('relatorios.create', ['clientesP' => $clientesP, 'clientesC' => $clientesC, 'categoriasP' => $categoriasP, 'categoriasC' => $categoriasC, 'perguntasP' => $perguntasP, 'perguntasC' => $perguntasC, 'hash' => $hash]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validacao = $request->validate([
            'id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'cliente_id' => ['required', 'string'],
            'relatorio_id.*' => ['nullable','integer'],
            'resp.*' => ['nullable','string'],
            'pergunta_id.*' => ['nullable','integer'],
            'link.*' => ['nullable','string']
        ]);

        $tempo = date('Y-m-d H:i:s');
        $hash = strtotime($tempo);
        $relatorio = new Relatorios;
        $relatorio->id =  $validacao['id'];
        $relatorio->user_id = $validacao['user_id'];
        $relatorio->cliente_id = $validacao['cliente_id'];
        if($relatorio->save()){        
            $relatorio_id = $request->relatorio_id ?? [];
            $perguntas = $request->pergunta_id ?? [];
            $respostas = $request->resposta ?? [];
            $links = $request->link ?? [];
            
            $dados = array_map(function($relatorio_id, $perguntas, $resposta, $link) {
                return [
                    'relatorio_id' => $relatorio_id,
                    'pergunta_id' => $perguntas,
                    'resposta' => $resposta, 
                    'link' => $link
                ];
            }, $relatorio_id, $perguntas, $respostas, $links);

            try {
                $inserir = DB::table('respostas')->insert($dados);
            } catch (QueryException $e) {
                // Caso falhe
                dd($e->getMessage());
            }

            if($inserir){
                return redirect('relatorios');
                session()->flash('success', 'Salvo com Sucesso!');
            } else {
                return redirect('relatorios');
                session()->flash('success', 'Erro ao salvar!');

            }
        }
    }

    public function show($id)
    {
        $resposta = Respostas::where('relatorio_id', $id)->get();
        $relatorio = Relatorios::findOrFail($id);
        $categorias = Categorias::all();

        return view('relatorios.show', ['resposta' => $resposta, 'relatorio' => $relatorio, 'categorias' => $categorias]);
    }

    public function destroy($id)
    {
        $relatorio = Relatorios::destroy($id);
        return redirect('relatorios.index');
    }
}
