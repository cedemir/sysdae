<!DOCTYPE html>
<html>
<head>
  <title>Relatório de Usuários</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left">
          <h2>Relatório de Ocorrências</h2>
        </div>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{route('ocorrencias.index',['download'=>'pdf'])}}">Download PDF</a>
        </div>
      </div>
    </div><br>

    <table class="table table-bordered">
      <tr>
        <th>Aluno_id</th>
        <th>Data Ocorrencia</th>
        <th>Descrição Ocorrência</th>
        <th>Data Reunião Conselho Disciplinar</th>
        <th>Medidas  Adotadas</th>
        <th>Total de Horas Recebidas</th>
      </tr>

      @foreach ($ocorrencias as $ocorrencia)
      <tr>
        <td>{{ $ocorrencia->aluno_id }}</td>
        <td>{{ $ocorrencia->data_ocorrencia->format('d/m/Y') }}</td>
        <td>{{ $ocorrencia->descricao_ocorrencia }}</td>
        <td>{{ $ocorrencia->data_reuniao_conselho_disciplinar}}</td>
        <td>{{ $ocorrencia->medidas}}</td>
        <td>{{ $ocorrencia->total_horas_recebidas }}</td>

      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>