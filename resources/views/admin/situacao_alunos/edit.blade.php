@extends('layouts.app')

@section('title')

Atualizar Situação Alunos

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Situação Alunos</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.situacao_alunos.update',$situacao_aluno->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Nome da Situação</label>
            <input type="text" class="form-control @error('descricao_situacao') is-invalid @enderror" name="descricao_situacao" value="{{$situacao_aluno->descricao_situacao}}">
            @error('descricao_situacao')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Situação</button>

    </form>
</div>
@endsection