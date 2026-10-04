@extends('layouts.site')

@section('title') 
Cadastro de Alunos
    
@endsection

@section('content') 
  <div class="row">
      <div class="col-12">
     
          <h2>Aluno: {{$data->nome}} </h2>  
      </div>
  </div>

<div class="row">
    <div class="col-12">
       
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="foto-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Fotos</a>
        </li>
        
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
        <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">...</div>
        
      </div>
  
        {{$data->slug}}
    </div>
   
        

        <div class="row">
            @foreach ($data->fotos as $foto)

              <div class="col3">
                <img src="{{$foto->foto}}" alt="Foto do Aluno {{$data->nome}}" class="img-fluid">
              </div>

            @endforeach

        </div>
      
      </div>
      
      </div>
</div>
      

</div>

@endsection