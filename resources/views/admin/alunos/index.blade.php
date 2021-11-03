@extends('layouts.app')

@section('title')

Meus Alunos

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus Alunos</h2>
        <a href="{{route('admin.alunos.create')}}" class="btn btn-success">Cadastrar Aluno</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Cpf</th>
                    <th width="16%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alunos as $aluno)  
                <tr>
                    <td>{{$aluno->id}} </td>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$aluno->cpf}}</td>
                    <td class="d-flex justify-content-between">
                        
                        <a href="{{route('admin.alunos.edit',$aluno->id)}}" class="btn btn-warning">Editar</a>
                        
                        <form action="{{route('admin.alunos.destroy',$aluno->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                       
                    </td>
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhum aluno encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$alunos->links()}}
    
    </div>


   

</div>
@endsection
