@extends('layouts.app')

@section('title')

Minhas Séries

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Séries</h2>
        <a href="{{route('admin.series.create')}}" class="btn btn-success">Cadastrar Séries</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome da Série</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($series as $serie)
                     
                <tr>
                    <td>{{$serie->id}} </td>
                    <td>{{$serie->descricao_serie}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.series.edit',$serie->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.series.destroy',$serie->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhuma série encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$series->links()}}
    
    </div>


   

</div>
@endsection
