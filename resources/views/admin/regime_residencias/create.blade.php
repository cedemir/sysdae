@extends('layouts.app')

@section('title')

Cadastrar Regime de Residência

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Regime de Residência</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.regime_residencias.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Regime de Residência </label>
            <input type="text" class="form-control @error('descricao_regime') is-invalid @enderror" name="descricao_regime">
            @error('descricao_regime')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Regime de Residência</button>

    </form>
</div>
@endsection