@extends('layouts.app')

@section('title')

Atualizar Medida Disciplinar

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Medida Disciplinar</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.medidas_disciplinares.update',$medidas_disciplinares->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label>Medida Disciplinar </label>
            <input type="text" class="form-control @error('medida_disciplinar') is-invalid @enderror" name="medida_disciplinar" value="{{$medidas_disciplinares->medida_disciplinar}}">
            @error('medida_disciplinar')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        

        

        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Medida Disciplinar</button>

    </form>
</div>
@endsection