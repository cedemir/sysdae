@extends('layouts.app')

@section('title')

Meus Apartamentos

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus Apartamentos</h2>
        <a href="{{route('admin.apartamentos.create')}}" class="btn btn-success">Cadastrar Apartamentos</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Alojamento</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                
                @forelse ($apartamentos as $apartamento)
                <?php $alojamentos=App\Models\Alojamento::where('id','=',$apartamento->alojamento_id)->first();
                //echo $alojamentos->descricao_alojamento;
                ?> 
                <tr>
                    <td>{{$apartamento->id}} </td>
                    <td>{{$apartamento->descricao_apartamento}}</td>
                    <td>{{$alojamentos->descricao_alojamento}}</td>
                    <td class="d-flex justify-content-between"><a href="{{route('admin.apartamentos.edit',$apartamento->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.apartamentos.destroy',$apartamento->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhum apartamento encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$apartamentos->links()}}
    
    </div>


   

</div>
@endsection
