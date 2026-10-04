@extends('layouts.app')

@section('title')

Meus Setores

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus Setores</h2>
        <a href="{{route('admin.setores.create')}}" class="btn btn-success">Cadastrar Setor</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome do Setor</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($setores as $setor)
                     
                <tr>
                    <td>{{$setor->id}} </td>
                    <td>{{$setor->setor}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.setores.edit',$setor->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.setores.destroy',$setor->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhum setor encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$setores->links()}}
    
    </div>


   

</div>
@endsection
