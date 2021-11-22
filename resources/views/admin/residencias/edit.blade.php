@extends('layouts.app')

@section('title')

Atualizar Residência Estudantil

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Residência Estudantil</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.residencias.update',$residencia->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label > Aluno </label>
            <select class="form-control" name="aluno_id" required >
                <option value="{{ $residencia->aluno_id}}">Selecione o Nome do Aluno   </option>
                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{$residencia->aluno_id == $aluno->id  ? 'selected' : ''}}>{{ $aluno->nome}}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label>Data de Entrada </label>
            <input type="text" class="form-control @error('data_entrada') is-invalid @enderror" name="data_entrada" 
            value="{{$residencia->data_entrada>format('d/m/Y')}}}}">
            @error('data_entrada')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Data de Saída</label>
            <input type="text" class="form-control @error('data_saida') is-invalid @enderror" name="data_saida" 
            value="{{$residencia->data_saida>format('d/m/Y')}}}}">
            @error('data_saida')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        
        <div class="form-group">
            <label > Regime de Residência </label>
            <select class="form-control" name="regime_residencia_id" required >
                <option value="{{ $residencia->aluno_id}}">Selecione o Regime da Residência   </option>
                @foreach($regime_residencias as $regime_residencia)
                <option value="{{ $regime_residencia->id }}" {{$residencia->regime_residencia_id == $regime_residencia->id  ? 'selected' : ''}}>{{ $regime_residencia->descricao_regime}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Apartamento </label>
            <input type="text" class="form-control @error('apto') is-invalid @enderror" name="apto" value="{{$residencia->apto}}">
            @error('apto')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Apartamento Antigo</label>
            <input type="text" class="form-control @error('apto_antigo') is-invalid @enderror" name="apto_antigo" value="{{$residencia->apto_antigo}}">
            @error('apto_antigo')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Apartamento Novo</label>
            <input type="text" class="form-control @error('apto_novo') is-invalid @enderror" name="apto" value="{{$residencia->apto_novo}}">
            @error('apto_novo')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Data da Troca </label>
            <input type="text" class="form-control @error('data_troca') is-invalid @enderror" name="data_troca" 
            value="{{$residencia->data_troca>format('d/m/Y')}}}}">
            @error('data_troca')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        
        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Residencia Estudantil</button>

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