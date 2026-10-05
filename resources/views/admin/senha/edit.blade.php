@extends('layouts.app')

@section('title')

Alterar senha

@endsection


@section('content')
<div class="col-12 my-5">
<h2>Alterar senha</h2>
</div>

<div class="col-12">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form action="{{route('admin.senha.update')}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Senha atual</label>
            <input type="password" class="form-control @error('senha_atual') is-invalid @enderror" name="senha_atual" autocomplete="current-password">
            @error('senha_atual')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nova senha</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
            @error('password')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Confirme a nova senha</label>
            <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-lg btn-success">Alterar senha</button>

    </form>
</div>
@endsection
