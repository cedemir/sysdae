@extends('layouts.app')

@section('title')

Cadastrar Residência Estudantil
  
    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Residência Estudantil</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.residencias.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label > Aluno </label>
            <select class="form-control" name="aluno_id" id="aluno_id" required>
                <option value=""> Selecione o Aluno </option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id}}"> {{ $aluno->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label > Residência </label>
            <select class="form-control" name="regime_residencia_id" id="regime_residencia_id" required>
                <option value=""> Selecione o Regime de Residência </option>
                @foreach($regime_residencias as $regime_residencia)
                    <option value="{{ $regime_residencia->id}}"> {{ $regime_residencia->descricao_regime}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Data de Entrada </label>
            <input type="date" class="form-control @error('data_entrada') is-invalid @enderror" name="data_entrada">
            @error('data_entrada')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Data de Saída </label>
            <input type="date" class="form-control @error('data_saida') is-invalid @enderror" name="data_saida">
            @error('data_saida')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Apartamento </label>
            <input type="date" class="form-control @error('apto') is-invalid @enderror" name="apto">
            @error('apto')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Apartamento Antigo</label>
            <input type="text" class="form-control @error('apto_antigo') is-invalid @enderror" name="apto_antigo">
            @error('apto_antigo')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Apartamento Novo</label>
            <input type="text" class="form-control @error('apto_novo') is-invalid @enderror" name="apto_novo">
            @error('apto_novo')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Data de Troca </label>
            <input type="text" class="form-control @error('data_troca') is-invalid @enderror" name="data_troca">
            @error('data_troca')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Residência Estudantil</button>

    </form>
</div>
@endsection
@section('scripts')
    <script>
        let e1 = document.querySelector('input[name=data_entrada]');
        let e2 = document.querySelector('input[name=data_saida]');
        let e3 = document.querySelector('input[name=data_troca]');
        let im = new Inputmask('99/99/9999');
        let im2 = new Inputmask('99/99/9999');
        let im3 = new Inputmask('99/99/9999');
        im.mask(e1);
        im2.mask(e2);
        im3.mask(e3);

     </script>
@endsection