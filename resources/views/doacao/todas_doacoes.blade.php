<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Todas Doações</title>
    </head>
    <body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #DA70D6;">
                        <div class="title" style="float:left;">
                          
                        </div>
                        <div class="add-button" style="float:right;">
                            <a class="btn btn-dark" href="{{ route('adicionar.doacao') }}">Adicionar Doações</a>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #DA70D6;">
                        @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <div class="table-responsive">
    <table class="table table-bordered" >
        <thead>
            <tr>
                <th>Data</th>
                <th>Nome da Doadora</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
                          
                            @foreach($todas_doacoes as $key=>$doacao)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($doacao->data)->format('d-m-Y') }}</td>
                                <td>
                                     {{$doacao->nome_doadora}}
                                </td>
                                <td>
                                     {{$doacao->quantidade}} <strong>ml</strong>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('editar.doacao',$doacao->id) }}">Editar</a>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Esta certo que quer deletar a Doação?')" href="{{ route('deletar.doacao',$doacao->id) }}">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                           </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {!! $todas_doacoes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

</x-app-layout>