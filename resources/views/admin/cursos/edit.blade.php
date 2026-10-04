@extends('layouts.app')

@section('title')

Atualizar curso

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar curso</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.cursos.update',$curso->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Nome do curso </label>
            <input type="text" class="form-control @error('descricao_curso') is-invalid @enderror" name="descricao_curso" value="{{$curso->descricao_curso}}">
            @error('descricao_curso')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar curso</button>

    </form>
</div>
@endsection