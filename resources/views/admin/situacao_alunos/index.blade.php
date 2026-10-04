@extends('layouts.app')

@section('title')

Minha Situação do Aluno

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minha Situação do Aluno</h2>
        <a href="{{route('admin.situacao_alunos.create')}}" class="btn btn-success">Cadastrar Situação Aluno</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome da Situação</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($situacao_alunos as $situacao_aluno)
                     
                <tr>
                    <td>{{$situacao_aluno->id}} </td>
                    <td>{{$situacao_aluno->descricao_situacao}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.situacao_alunos.edit',$situacao_aluno->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.situacao_alunos.destroy',$situacao_aluno->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=12>Nenhuma Situação de Aluno encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$situacao_alunos->links()}}
    
    </div>


   

</div>
@endsection
