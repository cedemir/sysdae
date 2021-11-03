@extends('layouts.app')

@section('title')

Atualizar Matriculas

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar matricula</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.matriculas.update',$matricula->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")

        <div class="form-group">
            <label>Número de matrícula </label>
            <input type="number" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{$matricula->matricula}}">
            @error('matricula')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Nome do Aluno </label>
        <select class="form-control" name="aluno_id" required id="aluno_id">
            <option value=""> Selecione o Aluno </option>
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{$matricula->aluno_id == $aluno->id  ? 'selected' : ''}}>{{ $aluno->nome}}</option>
            @endforeach
        </select>
        </div>

        
       
        <div class="form-group">
            <label > Série do Aluno </label>
            <select class="form-control" name="serie_id" id="serie_id" required>
                <option value=""> Selecione a Série </option>
                @foreach($series as $serie)
                <option value="{{ $serie->id }}" {{$matricula->serie_id == $serie->id  ? 'selected' : ''}}>{{ $serie->descricao_serie}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Turma do Aluno </label>
            <select class="form-control" name="turma_id" id="turma_id" required>
                <option value=""> Selecione a Turma do Aluno </option>
                @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" {{$matricula->turma_id == $turma->id  ? 'selected' : ''}}>{{ $turma->descricao_turma}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Ano de matrícula </label>
            <input type="number" class="form-control @error('ano') is-invalid @enderror" name="ano" value="{{$matricula->ano}}">
            @error('ano')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Curso do Aluno </label>
            <select class="form-control" name="curso_id" id="curso_id" required>
                <option value=""> Selecione o Curso do Aluno </option>
                @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" {{$matricula->curso_id == $curso->id  ? 'selected' : ''}}>{{ $curso->descricao_curso}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Atualizar matricula</button>

    </form>
</div>
@endsection