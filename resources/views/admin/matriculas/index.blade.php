@extends('layouts.app')

@section('title')

Minhas Matrículas

    
@endsection


@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-itens-center my=5">
        <h2>Minhas Matrículas</h2>
        <a href="{{route('admin.matriculas.create')}}" class="btn btn-success">Cadastrar Matriculas</a>
    </div>
    <div class="col-12">
        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Matricula</th>
                    <th>Aluno</th>
                    <th>Série</th>
                    <th>Turma</th>
                    <th>Ano</th>
                    <th>Curso</th>
                    <th width="16%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matriculas as $matricula)
                <?php 
                $aluno=App\Models\Aluno::where('id','=',$matricula->aluno_id)->first();
                $serie=App\Models\Serie::where('id','=',$matricula->serie_id)->first();
                $turma=App\Models\Turma::where('id','=',$matricula->turma_id)->first();
                $curso=App\Models\Curso::where('id','=',$matricula->curso_id)->first();
                ?> 
                
                <tr>
                    <td>{{$matricula->id}} </td>
                    <td>{{$matricula->matricula}}</td>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$serie->descricao_serie}}</td>
                    <td>{{$turma->descricao_turma}}</td>
                    <td>{{$matricula->ano}}</td>
                    <td>{{$curso->descricao_curso}}</td>

                    <td class="d-flex justify-content-between">
                        <a href="{{route('admin.matriculas.edit',$matricula->id)}}" class="btn btn-warning">Editar</a>
                        
                        <form action="{{route('admin.matriculas.destroy',$matricula->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
    
                <tr>
                    <td colspan=12>Nenhuma matrícula encontrada</td>
                </tr>        
    
                @endforelse
            </tbody>
        </table>
        
        {{$matriculas->links()}}
    
    </div>


   

</div>
@endsection
