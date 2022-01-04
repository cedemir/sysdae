@extends('layouts.app')

@section('title')

Cadastrar Matrículas
    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Matrículas</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.matriculas.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Matricula </label>
            <input type="numeric" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{old('matricula')}}">
            @error('matricula')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Nome do Aluno </label>
            <select class="form-control" name="aluno_id" id="aluno_id" required>
                <option value=""> Selecione o Aluno </option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id}}"> {{ $aluno->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Série do Aluno </label>
            <select class="form-control" name="serie_id" id="serie_id" required>
                <option value=""> Selecione a Série </option>
                @foreach($series as $serie)
                    <option value="{{ $serie->id}}"> {{ $serie->descricao_serie}}</option>
                @endforeach
            </select>
        </div>
       
        


        <div class="form-group">
            <label > Turma do Aluno </label>
            <select class="form-control" name="turma_id" id="turma_id" required>
                <option value=""> Selecione a Turma</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id}}"> {{ $turma->descricao_turma}}</option>
                @endforeach
            </select>
            
        </div>

        <div class="form-group">
            <label>Ano </label>
            <input type="numeric" class="form-control @error('ano') is-invalid @enderror" name="ano" value="{{old('ano')}}">
            @error('ano')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Curso do Aluno </label>
            <select class="form-control" name="curso_id" id="curso_id" required>
                <option value=""> Selecione o Curso </option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id}}"> {{ $curso->descricao_curso}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Matrículas</button>

    </form>
</div>
@endsection