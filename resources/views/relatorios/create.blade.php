@extends('layouts.admin')

@section('title','Novo Relatório')

@section('content')

<div class="container" style="padding: 58px;">
    <div class="row">
        <div class="col">
            <form style="border: 1px solid var(--bs-border-color);border-radius: 4px;box-shadow: 1px 1px 20px 2px rgb(200,200,200);padding: 17px;" action="{{route('relatorios.store')}}" id="prefeituraForm" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$hash}}">
                <div class="row">
                    <h2>Tipo Cliente</h2>
                    <select class="form-select" id="tipo" required>
                            <option value="" selected>Selecione</option>
                            <option value="P">Prefeitura</option>
                            <option value="C">Câmara</option>
                    </select>
                    {{-- Prefeitura --}}
                    <div id="prefeitura" style="display: none;">
                        <h2>Cliente:</h2>
                        <select class="form-select" name="cliente_id" id="clienteP" required>
                                <option value="" selected>Selecione</option>
                                @foreach($clientesP as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                        </select>
                        <div id="perguntasP" style="display: none;">
                            <table class="table">             
                                
                                @foreach($categoriasP as $categoria)
                                
                                <tr>
                                    <td  colspan="100%"><h3>{{$categoria->categoria}}</h3></td>
                                </tr> 
                            @foreach($perguntasP as $pergunta)   
                            @if($pergunta->categoria_id == $categoria->num)
                            <tr>
                                <input type="hidden" name="relatorio_id[]" value="{{$hash}}">
                                <td><label class="form-label" style="font-size: 20px">{{ $pergunta->pergunta }}:</label></td>    
                                <td style="width: 350px">
                                    <input type="hidden" name="pergunta_id[]" value="{{$pergunta->id}}">
                                    <input type="hidden" style="padding-left: 0px;margin-left: 7px;" selected value="" name="resposta[{{$pergunta->id}}]">
                                    <input type="radio" style="padding-left: 0px;margin-left: 7px;" value="Sim" name="resposta[{{$pergunta->id}}]">
                                    <label class="form-label" style="margin-left: 5px;">Sim</label>
                                    <input type="radio" style="padding-left: 0px;margin-left: 7px;" value="Não" name="resposta[{{$pergunta->id}}]">
                                    <label class="form-label" style="margin-left: 4px;">Não</label><br>
                                    <label class="form-label" style="margin-left: 4px;"><strong>Link:</strong></label>
                                    <textarea name="link[]" id="link" cols="40" rows="2"></textarea> 
                                </td>
                            </tr>
                            @endif
                            @endforeach 
                            @endforeach
                            </table>
                            <button class="btn btn-success" type="button" id="cadastrarP" style="margin-top: 30px">Salvar</button>
                        </div>
                    </div>
            </form>





                    {{-- Câmara --}}
                    <div id="camara" style="display: none;">
                        <form action="{{route('relatorios.store')}}" id="camaraForm" method="POST">
                            @csrf    
                        <h2>Cliente:</h2>
                        <select class="form-select" name="cliente_id" id="clienteC" required>
                                <option value="" selected>Selecione</option>
                                @foreach($clientesC as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                        </select>
                        <div id="perguntasC" style="display: none">
                                <table class="table">
                                    <input type="hidden" name="id" value="{{$hash}}">               
                                    
                                    @foreach($categoriasC as $categoria)
                                    
                                    <tr>
                                        <td  colspan="100%"><h3>{{$categoria->categoria}}</h3></td>
                                    </tr> 
                                @foreach($perguntasC as $pergunta)  
                                @if($pergunta->categoria_id == $categoria->num) 
                                
                                <input type="hidden" name="relatorio_id[]" value="{{$hash}}">               
                                <tr>
                                    <td><label class="form-label" style="font-size: 20px">{{ $pergunta->pergunta }}:</label></td>    
                                    <td style="width: 350px">
                                        <input type="hidden" name="pergunta_id[]" value="{{$pergunta->id}}">
                                        <input type="hidden" style="padding-left: 0px;margin-left: 7px;" selected value=" " name="resposta[{{$pergunta->id}}]">
                                        <input type="radio" style="padding-left: 0px;margin-left: 7px;" value="Sim" name="resposta[{{$pergunta->id}}]">
                                        <label class="form-label" style="margin-left: 5px;">Sim</label>
                                        <input type="radio" style="padding-left: 0px;margin-left: 7px;" value="Não" name="resposta[{{$pergunta->id}}]">
                                        <label class="form-label" style="margin-left: 4px;">Não</label><br>
                                        <label class="form-label" style="margin-left: 4px;"><strong>Link:</strong></label>
                                        <textarea name="link[]" id="link" cols="40" rows="2"></textarea>
                                        
                                    </td>
                                </tr>
                                @endif
                                @endforeach 
                                @endforeach  
                            </div>
                         </div>

                    </table>
                    <button class="btn btn-success" type="submit" id="cadastrarC" style="margin-top: 30px">Salvar</button>
                </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
    $('#tipo').change(function(){
        var selectedOption = $(this).val();
        if(selectedOption === 'P'){
            $('#prefeitura').fadeIn("slow");
            $('#camara').fadeOut("slow");
        } else if(selectedOption === 'C'){
            $('#prefeitura').fadeOut("slow");
            $('#camara').fadeIn("slow");
        } else {
            $('#prefeitura').fadeOut("slow");
            $('#camara').fadeOut("slow");
        }
    });
    $('#clienteP').change(function(){
        var selectedOption = $(this).val();
        if(selectedOption !== ''){
            $('#perguntasP').fadeIn("slow");
        } else {
            $('#perguntasP').hide();
        }
    });
    $('#clienteC').change(function(){
        var selectedOption = $(this).val();
        if(selectedOption !== ''){
            $('#perguntasC').fadeIn("slow");
        } else {
            $('#perguntasC').hide();
        }
    });
});
$(document).ready(function() {
    $('button[id="cadastrarP"]').on('click', function(){
        alert('Formulário Cadastrado com Sucesso!');
        $('#prefeituraForm').submit();
    })
})
$(document).ready(function() {
    $('button[id="cadastrarC"]').on('click', function(){
        alert('Formulário Cadastrado com Sucesso!');
        $('#camaraForm').submit();
    })
})
</script>

@endsection