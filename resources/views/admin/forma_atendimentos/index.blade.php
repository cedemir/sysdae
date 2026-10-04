@extends('layouts.app')

@section('title')

Minhas Formas de Atendimento

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Formas de Atendimentos</h2>
        <a href="{{route('admin.forma_atendimentos.create')}}" class="btn btn-success">Cadastrar Formas de Atendimento</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Forma de Atendimento</th>
                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($forma_atendimentos as $forma_atendimento)
                     
                <tr>
                    <td>{{$forma_atendimento->id}} </td>
                    <td>{{$forma_atendimento->forma_atendimento}}</td>
                    
                    <td class="d-flex justify-content-between"><a href="{{route('admin.forma_atendimentos.edit',$forma_atendimento->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.forma_atendimentos.destroy',$forma_atendimento->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhuma Forma de Atendimento encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$forma_atendimentos->links()}}
    
    </div>


   

</div>
@endsection
