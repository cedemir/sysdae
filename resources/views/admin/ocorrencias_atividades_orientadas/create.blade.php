@extends('layouts.app')

@section('title')

Cadastrar Atividade Orientada

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Atividade Orientada</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.ocorrencias_atividades_orientadas.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label > Ocorrência </label>
            <select class="form-control" name="ocorrencia_id" id="ocorrencia_id" required>
                <option value=""> Selecione a Ocorrência</option>
                @foreach($ocorrencias as $ocorrencia)
                    <option value="{{ $ocorrencia->id}}"> {{ $ocorrencia->descricao_ocorrencia}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Aluno </label>
            <select class="form-control" name="aluno_id" id="aluno_id" required>
                <option value=""> Selecione o Aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id}}"> {{ $aluno->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Servidor Responsável </label>
            <select class="form-control" name="user_id" id="user_id" required>
                <option value=""> Selecione o Servidor Responsável</option>
                @foreach($users as $user)
                    <option value="{{ $user->id}}"> {{ $user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Setor </label>
            <select class="form-control" name="setor_id" id="setor_id" required>
                <option value=""> Selecione o Setor</option>
                @foreach($setores as $setor)
                    <option value="{{ $setor->id}}"> {{ $setor->setor}}</option>
                @endforeach
            </select>
        </div>
    

        <div class="form-group">
            <label>Data </label>
            <input type="text" class="form-control @error('data') is-invalid @enderror" name="data">
            @error('data')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Horas </label>
            <input type="text" class="form-control @error('nro_horas') is-invalid @enderror" name="nro_horas">
            @error('nro_horas')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Atividade Orientada</button>

    </form>
</div>
@endsection
@section('scripts')
    <script>
        let el = document.querySelector('input[name=data]');

        let im = new Inputmask('99/99/9999');
        im.mask(el);
     </script>
@endsection