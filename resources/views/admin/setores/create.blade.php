@extends('layouts.app')

@section('title')

Cadastrar Setor

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Setor</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.setores.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Nome do Setor </label>
            <input type="text" class="form-control @error('setor') is-invalid @enderror" name="setor">
            @error('setor')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Setor</button>

    </form>
</div>
@endsection