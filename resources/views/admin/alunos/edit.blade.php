@extends('layouts.app')

@section('title')

Atualizar Aluno

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Aluno</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.alunos.update',$aluno->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")

        <div class="form-group">
            <label>CPF do Aluno </label>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{$aluno->cpf}}">
            @error('cpf')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Nome do Aluno </label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{$aluno->nome}}">
            @error('nome')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    

        <div class="form-group">
            <label>Sexo</label>
            <input type="text" class="form-control @error('sexo') is-invalid @enderror" name="sexo" value="{{$aluno->sexo}}">
            @error('sexo')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email </label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$aluno->email}}">
            @error('email')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
{{--
        <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$aluno->slug}}">
            @error('slug')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
--}}
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{$aluno->telefone}}">
            @error('telefone')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nome do Pai</label>
            <input type="text" class="form-control @error('nome_pai') is-invalid @enderror" name="nome_pai" value="{{$aluno->nome_pai}}">
            @error('nome_pai')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Telefone do Pai</label>
            <input type="text" class="form-control @error('telefone_pai') is-invalid @enderror" name="telefone_pai" value="{{$aluno->telefone_pai}}">
            @error('telefone_pai')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nome da Mãe</label>
            <input type="text" class="form-control @error('nome_mae') is-invalid @enderror" name="nome_mae" value="{{$aluno->nome_mae}}">
            @error('nome_mae')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Telefone da Mãe</label>
            <input type="text" class="form-control @error('telefone_mae') is-invalid @enderror" name="telefone_mae" value="{{$aluno->telefone_mae}}">
            @error('telefone_mae')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Contato de Emergência</label>
            <input type="text" class="form-control @error('contato_emergencia') is-invalid @enderror" name="contato_emergencia" value="{{$aluno->contato_emergencia}}">
            @error('contato_emergencia')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Municipio</label>
            <input type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" value="{{$aluno->municipio}}">
            @error('municipio')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Programa de Benefício </label>
            <select class="form-control" name="beneficio_id" required >
                <option value="{{ $aluno->beneficio_id}}">Selecione o Beneficio do Aluno   </option>
                @foreach($programa_beneficios as $beneficio)
                <option value="{{ $beneficio->id }}" {{$aluno->beneficio_id == $beneficio->id  ? 'selected' : ''}}>{{ $beneficio->descricao_beneficio}}</option>
                @endforeach
            </select>
        </div>
       
        <div class="form-group">
            <label > Situação do Aluno </label>
            <select class="form-control" name="situacao_id" required>
                <option value="{{ $aluno->situacao_id}}"> Selecione a Situação do Aluno </option>
                @foreach($situacao_alunos as $situacao)
                <option value="{{ $situacao->id }}" {{$aluno->situacao_id == $situacao->id  ? 'selected' : ''}}>{{ $situacao->descricao_situacao}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Observações</label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" id="observacoes" cols="80" rows="10">{{$aluno->observacoes}}</textarea>
            @error('observacoes')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Atualizar Aluno</button>

    </form>
</div>
@endsection