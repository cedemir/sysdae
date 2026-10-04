@extends('layouts.app')

@section('title')

Atualizar Setor

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Setor</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.setores.update',$setor->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Nome do Setor </label>
            <input type="text" class="form-control @error('setor') is-invalid @enderror" name="setor" value="{{$setor->setor}}">
            @error('setor')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Setor</button>

    </form>
</div>
@endsection