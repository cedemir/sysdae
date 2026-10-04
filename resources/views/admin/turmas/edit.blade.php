@extends('layouts.app')

@section('title')

Atualizar Turma

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Turma</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.turmas.update',$turma->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Nome da série </label>
            <input type="text" class="form-control @error('descricao_turma') is-invalid @enderror" name="descricao_turma" value="{{$turma->descricao_turma}}">
            @error('descricao_turma')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Turma</button>

    </form>
</div>
@endsection