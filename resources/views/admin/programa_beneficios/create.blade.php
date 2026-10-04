@extends('layouts.app')

@section('title')

Cadastrar Programa Benefício

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Programa Beneficio</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.programa_beneficios.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Programa de Benefício </label>
            <input type="text" class="form-control @error('descricao_beneficio') is-invalid @enderror" name="descricao_beneficio">
            @error('descricao_beneficio')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar descrição beneficio</button>

    </form>
</div>
@endsection