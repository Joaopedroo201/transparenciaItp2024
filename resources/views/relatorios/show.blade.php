@extends('layouts.admin')

@section('title', 'Visualizar Relatório')

@section('content')


<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            pageLength: 100,
            dom: 'Bfrtip',
            'ordering': false,
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copiar',
                    titleAttr: 'Copiar',
                    title: 'Relatório de {{$relatorio->cliente->nome ?? "Cliente Não Encontrado"}}',
                    message: 'Relatório realizado por: {$relatorio->user->name ?? "Usuário Não Encontrado"}}\n Data de realização: {{date("d/m/Y",strtotime($relatorio->created_at))}}'
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    titleAttr: 'Exportar para CSV',
                    title: 'Relatório de {{$relatorio->cliente->nome ?? "Cliente Não Encontrado"}}',
                    message: 'Relatório realizado por: {$relatorio->user->name ?? "Usuário Não Encontrado"}}\n Data de realização: {{date("d/m/Y",strtotime($relatorio->created_at))}}'
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    titleAttr: 'Exportar para Excel',
                    title: 'Relatório de {{$relatorio->cliente->nome ?? "Cliente Não Encontrado"}}',
                    message: 'Relatório realizado por: {$relatorio->user->name ?? "Usuário Não Encontrado"}}\n Data de realização: {{date("d/m/Y",strtotime($relatorio->created_at))}}'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    titleAttr: 'Exportar para PDF',
                    title: 'Relatório de {{$relatorio->cliente->nome ?? "Cliente Não Encontrado"}}',
                    message: 'Relatório realizado por: {{$relatorio->user->name ?? "teste"}}\n Data de realização: {{date("d/m/Y",strtotime($relatorio->created_at))}}'
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    titleAttr: 'Imprimir',
                    title: 'Relatório de {{$relatorio->cliente->nome ?? "Cliente Não Encontrado"}}',
                    message: 'Relatório realizado por: {{$relatorio->users->name ?? "teste"}}\n Data de realização: {{date("d/m/Y",strtotime($relatorio->created_at))}}'
                }
            ]
        } );
    } );
</script>

<div class="container" style="padding: 58px;">
    <div class="row">
        <div class="col" data-aos="fade-up">
            <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Perguntas</th>
                            <th>Respostas</th>
                            <th>Links</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resposta as $detalhes)
                        <tr>
                            <td><br>{{$detalhes->pergunta->pergunta ?? 'Erro na pergunta'}}</td>
                            <td>{{$detalhes->resposta}}</td>
                            <td>{{$detalhes->link}}</td>
                        </tr>  
                        @endforeach                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection