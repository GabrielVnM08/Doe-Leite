<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!doctype html>
    <html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Adicionar Doação</title>
    </head>
    <body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title" style="float:left;">
                            <h2 class="text-left">Adicionar Doação</h2>
                        </div>
                        <div class="add-button" style="float:right;">
                            <a class="btn btn-dark" href="{{ route('todas.doacoes') }}">Todas Doações</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
    
                        <form action="{{ route('salvar.doacao') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="mb-1">Data</label>
                                        <input type="date" name="data_doacao" class="form-control" value="{{ old('data_doacao') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1">Nome</label>
                                        <input type="text" name="nome_doadora" class="form-control" value="{{ old('nome_doadora') }}">
                                    </div>  
                                    <div class="mb-3">
                                        <label class="mb-1">Quantidade</label>
                                        <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade') }}">
                                    </div>                        
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
</x-app-layout>
