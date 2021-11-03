@extends('layouts.app')

@section('title')

Cadastrar Aluno

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Aluno</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.alunos.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>CPF do Aluno </label>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{old('cpf')}}">
            @error('cpf')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Nome do Aluno </label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{old('nome')}}">
            @error('nome')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    

        <div class="form-group">
            <label>Sexo</label>
            <input type="text" class="form-control @error('sexo') is-invalid @enderror" name="sexo" value="{{old('sexo')}}">
            @error('sexo')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email </label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
            @error('email')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

{{--        <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>
--}}
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{old('tlefone')}}">
            @error('telefone')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nome do Pai</label>
            <input type="text" class="form-control @error('nome_pai') is-invalid @enderror" name="nome_pai" value="{{old('nome_pai')}}">
            @error('nome_pai')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Telefone do Pai</label>
            <input type="text" class="form-control @error('telefone_pai') is-invalid @enderror" name="telefone_pai" value="{{old('telefone_pai')}}">
            @error('telefone_pai')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nome da Mãe</label>
            <input type="text" class="form-control @error('nome_mae') is-invalid @enderror" name="nome_mae" value="{{old('nome_mae')}}">
            @error('nome_mae')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Telefone da Mãe</label>
            <input type="text" class="form-control @error('telefone_mae') is-invalid @enderror" name="telefone_mae" value="{{old('telefone_mae')}}">
            @error('telefone_mae')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Contato de Emergência</label>
            <input type="text" class="form-control @error('contato_emergencia') is-invalid @enderror" name="contato_emergencia" value="{{old('contato_emergencia')}}">
            @error('contato_emergencia')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Municipio</label>
            <input type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" value="{{old('municipio')}}">
            @error('municipio')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Programa de Benefício </label>
            <select class="form-control" name="beneficio_id" id="beneficio_id" required>
                <option value=""> Selecione o Programa de Benefício </option>
                @foreach($programa_beneficios as $beneficio)
                    <option value="{{ $beneficio->id}}"> {{ $beneficio->descricao_beneficio}}</option>
                @endforeach
            </select>
        </div>
       
        <div class="form-group">
            <label > Situação do Aluno </label>
            <select class="form-control" name="situacao_id" id="situacao_id" required>
                <option value=""> Selecione a Situação do Aluno </option>
                @foreach($situacao_alunos as $situacao)
                    <option value="{{ $situacao->id}}"> {{ $situacao->descricao_situacao}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Observações</label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" id="observacoes" cols="80" rows="10">{{old('observacoes')}}</textarea>
            @error('observacoes')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
            
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Aluno</button>

    </form>
</div>
@endsection