@extends('layouts.app')

@section('title')

Cadastrar Ocorrência

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Cadastrar Ocorrência</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.ocorrencias.store')}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label > Aluno Envolvido</label>
            <select class="form-control" name="aluno_id" id="aluno_id" required>
                <option value=""> Selecione o Aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id}}"> {{ $aluno->nome}}</option>
                @endforeach
            </select>
            
        </div>


        <div class="form-group">
            <label>Data da Ocorrência </label>
            <input type="text" class="form-control @error('data_ocorrencia') is-invalid @enderror" name="data_ocorrencia">
            @error('data_ocorrencia')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    

        <div class="form-group">
            <label>Descrição da Ocorrência</label>
            <textarea class="form-control @error('descricao_ocorrencia') is-invalid @enderror" name="descricao_ocorrencia" id="outras_observacoes" cols="80" rows="10"></textarea>
            @error('descricao_ocorrencia')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Data da Reunião do Conselho Disciplinar </label>
            <input type="text" class="form-control @error('data_reuniao_conselho_disciplinar') is-invalid @enderror" name="data_reuniao_conselho_disciplinar">
            @error('data_reuniao_conselho_disciplinar')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Medidas </label>
            <input type="text" class="form-control @error('medidas') is-invalid @enderror" name="medidas">
            @error('medidas')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Total de Horas Recebidas </label>
            <input type="number" class="form-control @error('total_horas_recebidas') is-invalid @enderror" name="total_horas_recebidas">
            @error('total_horas_recebidas')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        




        <button type="submit" class="btn btn-lg btn-success">Cadastrar Ocorrência</button>

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