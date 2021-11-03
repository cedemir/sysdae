@extends('layouts.app')

@section('title')

Atualizar alojamento

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar alojamento</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.alojamentos.update',$alojamento->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")

        <div class="form-group">
            <label>Nome do Alojamento </label>
            <input type="text" class="form-control @error('descricao_alojamento') is-invalid @enderror" name="descricao_alojamento" value="{{$alojamento->descricao_alojamento}}">
            @error('descricao_alojamento')
            <div class="alert alert-danger">
                {{$message}}
            </div>
              
            @enderror
        </div>
    

        <div class="form-group">
            <label>Número de Apartamentos</label>
            <input type="text" class="form-control @error('nro_aptos') is-invalid @enderror" name="nro_aptos" value="{{$alojamento->nro_aptos}}">
            @error('nro_aptos')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Responsável </label>
            <input type="text" class="form-control @error('responsavel') is-invalid @enderror" name="responsavel" value="{{$alojamento->responsavel}}">
            @error('responsavel')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-lg btn-success">Atualizar alojamento</button>

    </form>
</div>
@endsection