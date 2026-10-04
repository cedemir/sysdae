@extends('layouts.app')

@section('title')

Minhas Medidas Disciplinares

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Medidas Disciplinares</h2>
        <a href="{{route('admin.medidas_disciplinares.create')}}" class="btn btn-success">Cadastrar Medidas Disciplinares</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Medida Disciplinar</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($medidas_disciplinares as $medida_disciplinar)
                     
                <tr>
                    <td>{{$medida_disciplinar->id}} </td>
                    <td>{{$medida_disciplinar->medida_disciplinar}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.medidas_disciplinares.edit',$medida_disciplinar->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.medidas_disciplinares.destroy',$medida_disciplinar->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=12>Nenhuma Medida Disciplinar Encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$medidas_disciplinares->links()}}
    
    </div>


   

</div>
@endsection
