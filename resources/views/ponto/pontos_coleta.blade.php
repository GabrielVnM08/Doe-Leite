<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pontos de Coleta</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="title" style="float:left;">
                        <h2>Pontos de coleta</h2>
                    </div>
                    <div class="add-button" style="float:right;">
                        <a class="btn btn-dark" href="{{ route('adicionar.ponto.coleta') }}">Adicionar Ponto de coleta</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <table class="table table-bordered">
                       <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                        </tr>
                       </thead>
                       <tbody>
                        @foreach($pontos_coleta as $key=>$ponto_coleta)
                        <tr>
                            <td>
                                <strong>Nome:</strong> {{ $ponto_coleta->nome }}<br>
                                <strong>Email:</strong> {{ $ponto_coleta->email }}<br>
                                <strong>Telefone:</strong> {{ $ponto_coleta->fone }}<br>
                                <strong>Endereço:</strong> {{ $ponto_coleta->endereco }}<br>
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('editar.ponto.coleta',$ponto_coleta->id) }}">Editar</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Esta certo que quer deletar o Ponto de coleta?')" href="{{ route('deletar.ponto.coleta',$ponto_coleta->id) }}">Deletar</a>
                            </td>
                        </tr>
                        @endforeach
                       </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {!! $pontos_coleta->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>