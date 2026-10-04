@extends('layouts.app')

@section('title')

Cadastrar Falta na Residência Estudantil
  
    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Falta na Residência Estudantil</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.residencia_faltas.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label > Aluno </label>
            <select class="form-control" name="aluno_id" id="aluno_id" required>
                <option value=""> Selecione o Aluno </option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id}}"> {{ $aluno->nome}}</option>
                @endforeach
            </select>
        </div>
        
        
        <div class="form-group">
            <label>Data da Falta</label>
            <input type="date" class="form-control @error('data_falta') is-invalid @enderror" name="data_falta">
            @error('data_falta')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Motivo </label>
            <input type="text" class="form-control @error('motivo') is-invalid @enderror" name="motivo">
            @error('motivo')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
            
        </div>

        <button type="submit" class="btn btn-lg btn-success">Cadastrar Falta na Residência Estudantil</button>

    </form>
</div>
@endsection
@section('scripts')
    <script>
        let e1 = document.querySelector('input[name=data_falta]');
        let im = new Inputmask('99/99/9999');
        im.mask(e1);
     
     </script>
@endsection