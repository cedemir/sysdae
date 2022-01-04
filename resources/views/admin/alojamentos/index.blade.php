@extends('layouts.app')

@section('title')

Meus Alojamentos

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus Alojamentos</h2>
        <a href="{{route('admin.alojamentos.create')}}" class="btn btn-success">Cadastrar Alojamentos</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Apartamentos</th>
                    <th>Responsável</th>
                    <th width="16%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alojamentos as $alojamento)
                     
                <tr>
                    <td>{{$alojamento->id}} </td>
                    <td>{{$alojamento->descricao_alojamento}}</td>
                    <td>{{$alojamento->nro_aptos}}</td>
                    <td>{{$alojamento->user_id}} </td>
                    <td class="d-flex justify-content-between"><a href="{{route('admin.alojamentos.edit',$alojamento->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.alojamentos.destroy',$alojamento->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>


                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhum alojamento encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$alojamentos->links()}}
    
    </div>


   

</div>
@endsection
