@extends('layouts.app')

@section('title')

Cadastrar Alojamento

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Alojamento</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.alojamentos.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Descrição do Alojamento </label>
            <input type="text" class="form-control @error('descricao_alojamento') is-invalid @enderror" name="descricao_alojamento">
            @error('descricao_alojamento')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Número de apartamentos </label>
            <input type="text" class="form-control @error('nro_aptos') is-invalid @enderror" name="nro_aptos">
            @error('nro_aptos')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        <div class="form-group">
            <label > Responsável </label>
            <select class="form-control" name="user_id" id="user_id" required>
                <option value=""> Selecione o Responsável</option>
                @foreach($users as $user)
                    <option value="{{ $user->id}}"> {{ $user->name}}</option>
                @endforeach
            </select>
        </div>

        


        <button type="submit" class="btn btn-lg btn-success">Cadastrar Alojamento</button>

    </form>
</div>
@endsection