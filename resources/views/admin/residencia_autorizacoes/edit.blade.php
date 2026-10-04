@extends('layouts.app')

@section('title')

Atualizar Autorizações de Saída da Residência Estudantil

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Autorizações de Saída da Residência Estudantil</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.residencia_autorizacoes.update',$residencia_autorizacoes->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        


        <div class="form-group">
            <label > Aluno </label>
            <select class="form-control" name="aluno_id" required >
                <option value="{{ $residencia_autorizacoes->aluno_id}}">Selecione o Nome do Aluno   </option>
                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{$residencia_autorizacoes->aluno_id == $aluno->id  ? 'selected' : ''}}>{{ $aluno->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Autorização Parcial</label>
            <input type="text" class="form-control @error('autorizacao_parcial') is-invalid @enderror" name="autorizacao_parcial" 
            value="{{$residencia_autorizacoes->autorizacao_parcial}}">
            @error('autorizacao_parcial')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        <div class="form-group">
            <label>Data </label>
            <input type="text" class="form-control @error('data') is-invalid @enderror" name="data" 
            value="{{$residencia_autorizacoes->data->format('d/m/Y')}}">
            @error('data')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Justificativa</label>
            <textarea class="form-control @error('justificativa') is-invalid @enderror" name="justificativa" id="justificativa" cols="80" rows="10">{{$residencia_autorizacoes->justificativa}}</textarea>
            @error('justificativa')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Forma de Autorizacao</label>
            <input type="text" class="form-control @error('forma_autorizacao') is-invalid @enderror" name="forma_autorizacao" 
            value="{{$residencia_autorizacoes->forma_autorizacao}}">
            @error('forma_autorizacao')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Quem Autorizou</label>
            <input type="text" class="form-control @error('quem_autorizou') is-invalid @enderror" name="quem_autorizou" 
            value="{{$residencia_autorizacoes->quem_autorizou}}">
            @error('forma_autorizacao')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-lg btn-success">Atualizar Autorização de Saída</button>

    </form>
</div>
@endsection
@section('scripts')
    <script>
        let e1 = document.querySelector('input[name=data');
       
        let im = new Inputmask('99/99/9999');
        
        im.mask(e1);
     

     </script>
@endsection