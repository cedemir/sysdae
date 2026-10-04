@extends('layouts.app')

@section('title')

Meus Atendimentos

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Meus Atendimentos</h2>
        <a href="{{route('admin.atendimentos.create')}}" class="btn btn-success">Cadastrar Atendimentos</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Aluno</th>
                    <th>Servidor Responsável</th>
                    <th>Forma Atendimento</th>
                    
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($atendimentos as $atendimento)
                <?php 
                $forma_atendimento=App\Models\Forma_atendimento::where('id','=',$atendimento->atendimento_id)->first();
                $aluno=App\Models\Aluno::where('id','=',$atendimento->aluno_id)->first();
                $user=App\Models\User::where('id','=',$atendimento->user_id)->first();
                 ?> 
                <tr>
                    <td>{{$atendimento->id}} </td>
                    <td>{{$atendimento->data->format('d/m/Y')}}</td>
                    <td>{{$atendimento->hora}}</td>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$forma_atendimento->forma_atendimento}}</td>
                    
                    <td><a href="{{route('admin.atendimentos.edit',$atendimento->id)}}" class="btn btn-warning">Editar</a>
                        <a href="{{route('admin.atendimentos.destroy',$atendimento->id)}}" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                @empty
    
                <tr>
                    <td colspan=12>Nenhum atendimento encontrado</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$atendimentos->links()}}
    
    </div>


   

</div>
@endsection
