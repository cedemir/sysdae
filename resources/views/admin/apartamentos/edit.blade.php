@extends('layouts.app')

@section('title')

Atualizar Apartamento

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar apartamento</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.apartamentos.update',$apartamento->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Nome do apartamento </label>
            <input type="text" class="form-control @error('descricao_apartamento') is-invalid @enderror" name="descricao_apartamento" value="{{$apartamento->descricao_apartamento}}">
            @error('descricao_apartamento')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        <div class="form-group">
            <label > Alojamento</label>
            <select class="form-control" name="alojamento_id" required >
                <option value="{{ $apartamento->alojamento_id}}">Selecione o Alojamento  </option>
                @foreach($alojamentos $alojamento)
                <option value="{{ $alojamento->id }}" {{$apartamento->alojamento_id == $alojamento->id  ? 'selected' : ''}}>{{ $alojamento->descricao_alojamento}}</option>
                @endforeach
            </select>
        </div>

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar apartamento</button>

    </form>
</div>
@endsection