@extends('layouts.app')

@section('title')

Meus Regimes de Residências

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus Regimes de Residências</h2>
        <a href="{{route('admin.regime_residencias.create')}}" class="btn btn-success">Cadastrar Regimes de Residência</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Regimes de Residências</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($regime_residencias as $regime_residencia)
                     
                <tr>
                    <td>{{$regime_residencia->id}} </td>
                    <td>{{$regime_residencia->descricao_regime}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.regime_residencias.edit',$regime_residencia->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.regime_residencias.destroy',$regime_residencia->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhum Regime de Residência encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$regime_residencias->links()}}
    
    </div>


   

</div>
@endsection
