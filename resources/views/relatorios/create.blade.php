@extends('layouts.admin')

@section('title','Novo Relatório')

@section('content')

<div class="container" style="padding: 58px;">
    <div class="row">
        <div class="col">
            <form style="border: 1px solid var(--bs-border-color);border-radius: 4px;box-shadow: 1px 1px 20px 2px rgb(200,200,200);padding: 17px;" action="/pages/novo_relatorioP" method="POST">
                @csrf
                <div class="row">
                    <h2>Tipo Cliente</h2>
                    <select class="form-select" name="tipo" required>
                            <option value="" selected>Selecione</option>
                            <option value="P">Prefeitura</option>
                            <option value="C">Câmara</option>
                    </select>
                    <h2>Cliente:</h2>
                    <select class="form-select" name="cliente_id" required>
                            <option value="" selected>Selecione</option>
                             @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                            @endforeach
                    </select>
                    <table class="table">
                        <input type="hidden" name="id" value="{{$hash}}">               
                        
                        @foreach($categorias as $categoria)
                        
                        <tr>
                            <td  colspan="100%"><h3>{{$categoria->categoria}}</h3></td>
                        </tr> 
                    @foreach($perguntas as $pergunta)   
                    @if($pergunta->categoria_id == $categoria->num) 
                    <input type="hidden" name="relatorio_id[]" value="{{$hash}}">               
                    <tr>
                    <td><label class="form-label" style="font-size: 20px">{{ $pergunta->pergunta }}:</label></td>    
                    <td style="width: 350px">
                        <input type="hidden" name="perguntas_id[]" value="{{$pergunta->id}}">
                        <input type="hidden" style="padding-left: 0px;margin-left: 7px;" selected value=" " name="resp[{{$pergunta->id}}]">
                        <input type="radio" style="padding-left: 0px;margin-left: 7px;" value="Sim" name="resp[{{$pergunta->id}}]">
                        <label class="form-label" style="margin-left: 5px;">Sim</label>
                        <input type="radio" style="padding-left: 0px;margin-left: 7px;" value="Não" name="resp[{{$pergunta->id}}]">
                        <label class="form-label" style="margin-left: 4px;">Não</label><br>
                        <label class="form-label" style="margin-left: 4px;"><strong>Link:</strong></label>
                        <textarea name="link[]" id="link" cols="40" rows="2"></textarea>
                        
                    </td>
                </tr>
                @endif
                    </div>
                    @endforeach
                   
                    
                    @endforeach
                </table>
                </div><button class="btn btn-success" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>


@endsection