<!DOCTYPE html>
<html>
<head>
  <title>Relatório de Alunos Semirresidentes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left">
          <h2>Relatório de Alunos Semirresidentes</h2>
        </div>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{route('semirresidentes.index',['download'=>'pdf'])}}">Download PDF</a>
        </div>
      </div>
    </div><br>

    <table class="table table-bordered">
      <tr>
        <th>Total de Alunos Semirresidentes</th>
        
      </tr>

      @foreach ($semirresidentes as $semirresidente)
      <tr>
        <td>{{ $semirresidente->TotalSemiResidentes }}</td>
        
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>