@extends('layouts.app')

@section('title')

Atualizar Ocorrência

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Ocorrência</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.ocorrencias.update',$ocorrencia->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")

        <div class="form-group">
            <label>Aluno Envolvido</label>
            <input type="text" class="form-control @error('aluno_id') is-invalid @enderror" name="aluno_id" value="{{$ocorrencia->aluno_id}}">
            @error('aluno_id')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Data da Ocorrência </label>
            <input type="text" class="form-control @error('data_ocorrencia') is-invalid @enderror" name="data_ocorrencia" value="{{$ocorrencia->data_ocorrencia->format('d/m/Y')}}">
            @error('data_ocorrencia')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    

        <div class="form-group">
            <label>Descrição da Ocorrência</label>
            <textarea class="form-control @error('descricao_ocorrencia') is-invalid @enderror" name="descricao_ocorrencia" id="descricao_ocorrencia" cols="80" rows="10">{{$ocorrencia->descricao_ocorrencia}}</textarea>
            @error('descricao_ocorrencia')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Data da Reunião do Conselho Disciplinar </label>
            <input type="text" class="form-control @error('data_reuniao_conselho_disciplinar') is-invalid @enderror" name="data_reuniao_conselho_disciplinar" value="{{$ocorrencia->data_reuniao_conselho_disciplinar->format('d/m/Y')}}">
            @error('data_reuniao_conselho_disciplinar')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Medidas </label>
            <input type="text" class="form-control @error('medidas') is-invalid @enderror" name="medidas" value="{{$ocorrencia->medidas}}" >
            @error('medidas')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Total de Horas Recebidas </label>
            <input type="numeric" class="form-control @error('total_horas_recebidas') is-invalid @enderror" name="total_horas_recebidas" value="{{$ocorrencia->total_horas_recebidas}}">
            @error('total_horas_recebidas')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-lg btn-success">Atualizar Ocorrência</button>

    </form>
</div>
@endsection
@section('scripts')
    <script>
        let el = document.querySelector('input[name=data_ocorrencia]');
        let e2 = document.querySelector('input[name=data_reuniao_conselho_disciplinar]');

        let im = new Inputmask('99/99/9999');
        let im2 = new Inputmask('99/99/9999');
        im.mask(el);
        im2.mask(e2);
     </script>
@endsection