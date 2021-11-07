@extends('layouts.app')

@section('title')

Minhas Residências

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Residências</h2>
        <a href="{{route('admin.residencias.create')}}" class="btn btn-success">Cadastrar Residência Estudantil</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Residência Estudantil</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($residencias as $residencia)
                     
                <tr>
                    <td>{{$residencia->id}} </td>
                    <td>{{$residencia->data_entrada}}</td>
                    <td>{{$residencia->data_saida}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.residencias.edit',$residencia->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.residencias.destroy',$residencia->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    i<td colspan=12>Nenhuma Residência encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$residencias->links()}}
    
    </div>


   

</div>
@endsection
