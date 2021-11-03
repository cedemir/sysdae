@extends('layouts.app')

@section('title')

Minhas Formas de Atendimentos

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus Programas de Benefícios</h2>
        <a href="{{route('admin.programa_beneficios.create')}}" class="btn btn-success">Cadastrar Programas de Benefícios</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Programa de Benefício</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($programa_beneficios as $programa_beneficio)
                     
                <tr>
                    <td>{{$programa_beneficio->id}} </td>
                    <td>{{$programa_beneficio->descricao_beneficio}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.programa_beneficios.edit',$programa_beneficio->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.programa_beneficios.destroy',$programa_beneficio->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhum Programa de Beneficio encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$programa_beneficios->links()}}
    
    </div>


   

</div>
@endsection
