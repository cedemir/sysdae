@extends('layouts.app')

@section('title')

Minhas Turmas

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Turmas</h2>
        <a href="{{route('admin.turmas.create')}}" class="btn btn-success">Cadastrar Turma</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome da Turma</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($turmas as $turma)
                     
                <tr>
                    <td>{{$turma->id}} </td>
                    <td>{{$turma->descricao_turma}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.turmas.edit',$turma->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.turmas.destroy',$turma->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=12>Nenhuma Turma encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$turmas->links()}}
    
    </div>


   

</div>
@endsection
