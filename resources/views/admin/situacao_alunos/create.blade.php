@extends('layouts.app')

@section('title')

Cadastrar curso

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar curso</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.cursos.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label>Nome do curso </label>
            <input type="text" class="form-control @error('descricao_curso') is-invalid @enderror" name="descricao_curso">
            @error('descricao_curso')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar curso</button>

    </form>
</div>
@endsection