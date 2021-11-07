@extends('layouts.app')

@section('title')

Atualizar Programa de Benefício

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Programa de Benefício</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.programa_beneficios.update',$programa_beneficio->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Programa de Benefício </label>
            <input type="text" class="form-control @error('descricao_beneficio') is-invalid @enderror" name="descricao_beneficio" value="{{$programa_beneficio->descricao_beneficio}}">
            @error('descricao_beneficio')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Programa de Benefício</button>

    </form>
</div>
@endsection