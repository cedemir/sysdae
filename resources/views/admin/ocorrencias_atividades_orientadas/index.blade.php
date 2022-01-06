@extends('layouts.app')

@section('title')

Minhas Atividades Orientadas

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Atividades Orientadas</h2>
        <a href="{{route('admin.ocorrencias_atividades_orientadas.create')}}" class="btn btn-success">Cadastrar Atividade Orientada</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição da Ocorrência</th>
                    <th>Aluno</th>
                    <th>Nome do Setor</th>
                    <th>Servidor</th>
                    <th>Horas umpridas</th>
                    <th width="16%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ocorrencias_atividades_orientadas as $ocorrencias_atividades_orientada)
                <?php
                 $ocorrencia=App\Models\Ocorrencia::where('id','=',$ocorrencias_atividades_orientada->ocorrencia_id)->first();
                 $setor=App\Models\Setor::where('id','=',$ocorrencias_atividades_orientada->setor_id)->first();
                ?>   
                <tr>
                    <td>{{$ocorrencias_atividades_orientada->id}} </td>
                    <td>{{$ocorrencia->descricao_ocorrencia}}</td>
                    <td>{{$setor->aluno_id}}</td>
                    <td>{{$setor->setor}}</td>
                    <td>{{$ocorrencias_atividades_orientada->servidor}}</td>
                    <td>{{$ocorrencias_atividades_orientada->nro_horas}} </td>
                    <td class="d-flex justify-content-between"><a href="{{route('admin.ocorrencias_atividades_orientadas.edit',$ocorrencias_atividades_orientada->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('admin.ocorrencias_atividades_orientadas.destroy',$ocorrencias_atividades_orientada->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>


                </tr>
                @empty
    
                <tr>
                    <td colspan=3>Nenhuma Atividade Orientada encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$ocorrencias_atividades_orientadas->links()}}
    
    </div>


   

</div>
@endsection
