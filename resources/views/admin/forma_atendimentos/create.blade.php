@extends('layouts.app')

@section('title')

Cadastrar Forma Atendimento

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar forma_atendimento</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.forma_atendimentos.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Forma Atendimento </label>
            <input type="text" class="form-control @error('forma_atendimento') is-invalid @enderror" name="forma_atendimento">
            @error('forma_atendimento')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Forma Atendimento</button>

    </form>
</div>
@endsection