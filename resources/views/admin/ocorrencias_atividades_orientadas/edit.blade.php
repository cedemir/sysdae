@extends('layouts.app')

@section('title')

Atualizar Atividade Orientada

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Atividade Orientada</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.ocorrencias_atividades_orientadas.update',$ocorrencias_atividades_orientadas->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        
        <div class="form-group">
            <label > Ocorrência </label>
            <select class="form-control" name="ocorrencia_id" id="ocorrencia_id"  required>
                <option value=""> Selecione a Ocorrência</option>
                @foreach($ocorrencias as $ocorrencia)
                <option value="{{ $ocorrencia->id }}" {{$ocorrencias_atividades_orientadas->ocorrencia_id == $ocorrencia->id  ? 
                    'selected' : ''}}>{{ $ocorrencia->descricao_ocorrencia}}</option>
    
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Setor </label>
            <select class="form-control" name="setor_id" id="setor_id"  required>
                <option value=""> Selecione o Setor</option>
                @foreach($setores as $setor)
                <option value="{{ $setor->id }}" {{$ocorrencias_atividades_orientadas->setor_id == $setor->id  ? 
                'selected' : ''}}>{{ $setor->setor}}</option>

                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label>Data </label>
            <input type="text" class="form-control @error('data') is-invalid @enderror" name="data" value="{{$ocorrencias_atividades_orientadas->data}}">
            @error('data')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Servidor </label>
            <input type="text" class="form-control @error('servidor') is-invalid @enderror" name="servidor" value="{{$ocorrencias_atividades_orientadas->servidor}}">
            @error('servidor')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Horas </label>
            <input type="text" class="form-control @error('nro_horas') is-invalid @enderror" name="nro_horas" value="{{$ocorrencias_atividades_orientadas->nro_horas}}">
            @error('nro_horas')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-success">Atualizar Atividade Orientada</button>

    </form>
</div>
@endsection
