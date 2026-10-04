@extends('layouts.app')

@section('title')

Minhas Autorizações de Saída

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Autorizações de Saída</h2>
        <a href="{{route('admin.residencia_autorizacoes.create')}}" class="btn btn-success">Cadastrar Autorização de Saída </a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>AlunoId</th>
                    <th>Autorização Parcial</th>
                    <th>Data</th>
                    <th>Justificativa</th>

                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($residencia_autorizacoes as $residencia_autorizacao)
                     
                <tr>
                    <td>{{$residencia_autorizacao->id}} </td>
                    <td>{{$residencia_autorizacao->aluno_id}} </td>
                    <td>{{$residencia_autorizacao->autorizacao_parcial}} </td>
                    <td>{{$residencia_autorizacao->data->format('d/m/Y')}}</td>
                    <td>{{$residencia_autorizacao->justificativa}} </td>
                    <td class="d-flex justify-content-between"><a href="{{route('admin.residencia_autorizacoes.edit',$residencia_autorizacao->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.residencia_autorizacoes.destroy',$residencia_autorizacao->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=12>Nenhuma Saída da Residência Encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$residencia_autorizacoes->links()}}
    
    </div>


   

</div>
@endsection
