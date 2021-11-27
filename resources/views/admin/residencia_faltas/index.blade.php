@extends('layouts.app')

@section('title')

Minhas Faltas na Residência

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Faltas na Residência</h2>
        <a href="{{route('admin.residencia_faltas.create')}}" class="btn btn-success">Cadastrar Falta na Residência</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>AlunoId</th>
                    <th>Data da Falta</th>
                    <th>Motivo</th>
                    

                    <th width="16%">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($residencia_faltas as $residencia_falta)
                     
                <tr>
                    <td>{{$residencia_falta->id}} </td>
                    <td>{{$residencia_falta->aluno_id}} </td>
                    <td>{{$residencia_falta->data_falta->format('d/m/Y')}}</td>
                    <td>{{$residencia_falta->motivo}} </td>
                    <td class="d-flex justify-content-between"><a href="{{route('admin.residencia_faltas.edit',$residencia_falta->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.residencia_faltas.destroy',$residencia_falta->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    
                </tr>
                @empty
    
                <tr>
                    <td colspan=12>Nenhuma Falta na Residência Encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$residencia_faltas->links()}}
    
    </div>


   

</div>
@endsection
