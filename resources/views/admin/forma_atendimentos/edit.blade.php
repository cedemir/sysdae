@extends('layouts.app')

@section('title')

Atualizar forma_atendimento

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Forma Atendimento</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.forma_atendimentos.update',$forma_atendimento->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Forma atendimento </label>
            <input type="text" class="form-control @error('forma_atendimento') is-invalid @enderror" name="forma_atendimento" value="{{$forma_atendimento->forma_atendimento}}">
            @error('forma_atendimento')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Forma Atendimento</button>

    </form>
</div>
@endsection