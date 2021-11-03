@extends('layouts.app')

@section('title')

Cadastrar Medida Disciplinar

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Medida Disciplinar</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.medidas_disciplinares.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Medida Disciplinar </label>
            <input type="text" class="form-control @error('medida_disciplinar') is-invalid @enderror" name="medida_disciplinar">
            @error('medida_disciplinar')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Forma Atendimento</button>

    </form>
</div>
@endsection