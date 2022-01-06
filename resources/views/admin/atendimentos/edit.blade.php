@extends('layouts.app')

@section('title')

Atualizar Atendimento

    
@endsection


@section('content')
<div class="col-12 my-5">
<h2>Atualizar Atendimento</h2>
</div>

<div class="col-12">
    <form action="{{route('admin.atendimentos.update',$atendimento->id)}}" method="POST">
        @csrf <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method("PUT")
        <div class="form-group">
            <label>Data </label>
            <input type="text" class="form-control @error('data') is-invalid @enderror" name="data" 
            value="{{$atendimento->data->format('d/m/Y')}}">
            @error('data')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Hora </label>
            <input type="text" class="form-control @error('hora') is-invalid @enderror" name="hora" value="{{$atendimento->hora}}">
            @error('hora')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
    
        <div class="form-group">
            <label > Aluno</label>
            <select class="form-control" name="aluno_id" required >
                <option value="{{ $atendimento->aluno_id}}">Selecione o Aluno   </option>
                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{$atendimento->aluno_id == $aluno->id  ? 'selected' : ''}}>{{ $aluno->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Servidor Responsável</label>
            <select class="form-control" name="user_id" required >
                <option value="{{ $atendimento->user_id}}">Selecione o Servidor   </option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{$atendimento->user_id == $user->id  ? 'selected' : ''}}>{{ $user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label > Forma de Atendimento</label>
            <select class="form-control" name="atendimento_id" required >
                <option value="{{ $atendimento->atendimento_id}}">Selecione a Forma de Atendimento   </option>
                @foreach($forma_atendimentos as $forma_atendimento)
                <option value="{{ $forma_atendimento->id }}" {{$atendimento->atendimento_id == $forma_atendimento->id  ? 'selected' : ''}}>{{ $forma_atendimento->forma_atendimento}}</option>
                @endforeach
            </select>
        </div>
       

        <div class="form-group">
            <label>Relato do Atendimento</label>
            <textarea class="form-control @error('relato_atendimento') is-invalid @enderror" name="relato_atendimento" id="relato_atendimento" cols="80" rows="10">{{$atendimento->relato_atendimento}}</textarea>
            @error('relato_atendimento')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Outras Observacoes</label>
            <textarea class="form-control @error('outras_observacoes') is-invalid @enderror" name="outras_observacoes" id="outras_observacoes" cols="80" rows="10">{{$atendimento->outras_observacoes}}</textarea>
            @error('outras_observacoes')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
            
        </div>

        <div class="form-group">
            <label>História de Vida</label>
            <textarea class="form-control @error('historia_de_vida') is-invalid @enderror" name="historia_de_vida" id="historia_de_vida" cols="80" rows="10">{{$atendimento->historia_de_vida}}</textarea>
            @error('historia_de_vida')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Encaminhamentos</label>
            <textarea class="form-control @error('encaminhamentos') is-invalid @enderror" name="encaminhamentos" id="encaminhamentos" cols="80" rows="10">{{$atendimento->encaminhamentos}}</textarea>
            @error('encaminhamentos')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-lg btn-success">Atualizar Atendimento</button>

    </form>
</div>
@endsection
@section('scripts')
    <script>
        let el = document.querySelector('input[name=data]');

        let im = new Inputmask('99/99/9999');
        im.mask(el);
     </script>
@endsection