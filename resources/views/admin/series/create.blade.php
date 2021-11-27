@extends('layouts.app')

@section('title')

Cadastrar Série

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Série</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.series.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Nome da serie </label>
            <input type="text" class="form-control @error('descricao_serie') is-invalid @enderror" name="descricao_serie">
            @error('descricao_serie')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Série</button>

    </form>
</div>
@endsection