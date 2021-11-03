@extends('layouts.app')

@section('title')

Meus Cursos

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus cursos</h2>
        <a href="{{route('admin.cursos.create')}}" class="btn btn-success">Cadastrar cursos</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome do Curso</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($cursos as $curso)
                     
                <tr>
                    <td>{{$curso->id}} </td>
                    <td>{{$curso->descricao_curso}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.cursos.edit',$curso->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.cursos.destroy',$curso->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhum curso encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$cursos->links()}}
    
    </div>


   

</div>
@endsection
