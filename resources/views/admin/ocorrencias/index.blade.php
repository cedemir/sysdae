@extends('layouts.app')

@section('title')

Minhas Ocorrências

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Ocorrências</h2>
        <a href="{{route('admin.ocorrencias.create')}}" class="btn btn-success">Cadastrar Ocorrência</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Alunos Envolvidos</th>
                    <th>Data da Ocorrência</th>
                    <th>Descrição da Ocorrência</th>
                    <th width="16%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ocorrencias as $ocorrencia)
                     
                <tr>
                    <td>{{$ocorrencia->id}} </td>
                    <td>{{$ocorrencia->alunos_envolvidos}}</td>
                    <td>{{$ocorrencia->data_ocorrencia->format('d/m/Y')}}</td>
                    <td>{{$ocorrencia->descricao_ocorrencia}} </td>
                    <td class="d-flex justify-content-between"><a href="{{route('admin.ocorrencias.edit',$ocorrencia->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.ocorrencias.destroy',$ocorrencia->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>


                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhuma ocorrencia encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$ocorrencias->links()}}
    
    </div>


   

</div>
@endsection
