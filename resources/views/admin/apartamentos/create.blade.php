@extends('layouts.app')

@section('title')

Cadastrar Apartamento

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Apartamento</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.apartamentos.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Descrição do Apartamento </label>
            <input type="text" class="form-control @error('descricao_apartamento') is-invalid @enderror" name="descricao_apartamento">
            @error('descricao_apartamento')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label > Alojamento </label>
            <select class="form-control " name="alojamento_id" id="alojamento_id" required>
                <option value=""> Selecione o Alojamento </option>
                @foreach($alojamentos as $alojamento)
                    <option value="{{$alojamento->id}}"> {{$alojamento->descricao_alojamento}}</option>
                @endforeach
            </select>
        </div>
       

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Apartamento</button>

    </form>
</div>
@endsection