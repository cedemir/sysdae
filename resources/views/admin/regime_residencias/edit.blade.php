@extends('layouts.app')

@section('title')

Atualizar Regime de Residência

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Regime de Residência</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.regime_residencias.update',$regime_residencia->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Regime de Residência </label>
            <input type="text" class="form-control @error('descricao_regime') is-invalid @enderror" name="descricao_regime" value="{{$regime_residencia->descricao_regime}}">
            @error('descricao_beneficio')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Regime de Residência</button>

    </form>
</div>
@endsection