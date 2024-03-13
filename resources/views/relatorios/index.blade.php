@extends('layouts.admin')

@section('title','Relatórios')

@section('content')

{{-- <h1 style="padding-bottom: 0px;padding-top: 31px;padding-left: 45px;">Bem vindo(a), {{Auth::user()->name}}</h1> --}}
<div class="container" style="padding: 58px;">
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-12">
            <h4>Relatórios realizados nos últimos dias</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Realizado Por:</th>
                            <th>Data</th>
                            <th class="text-center">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($relatorios as $relatorio)
                        <tr>
                            <td>{{$relatorio->id}}</td>
                            <td>{{$relatorio->cliente->nome ?? 'Cliente não encontrado !'}}</td>
                            <td>{{$relatorio->user->name ?? 'Usuario não encontrado !'}}</td>
                            <td>{{date('d/m/Y H:i:s',strtotime($relatorio->created_at))}}</td>
                            <td class="d-xxl-flex justify-content-xxl-center align-items-xxl-center">
                                <a href="{{route('relatorios.show', $relatorio->id)}}"><button class="btn btn-primary" type="button">Ver Relatório</button></a>
                                <form action="{{route('relatorios.destroy', $relatorio->id)}}" method="POST" id="formDelete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="button" id="buttonDelete" style="margin-right: 0px;margin-left: 31px;">Deletar</button>
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('button[id="buttonDelete"]').on('click', function(){
        if(confirm('Tem certeza que deseja deletar esse relatório?')){
            alert('Relatório deletado com sucesso!');
            $('#formDelete').submit();
        }
    })
})
</script>
    
@endsection