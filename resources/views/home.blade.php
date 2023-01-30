@extends('layouts.main')

@section('title', 'Home')

@section('content')

@if(count($clientes) != 0 && count($servicos) != 0)

    @if(count($ordens) != 0)
        <div class="container text-center p-3">
        <h1 class="text-muted display-5">Solicitação de Serviços </h1>
        </div>

        @if(session('success'))
            <div class="container alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
        <div class="container alert alert-danger text-center" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <div class="container able-responsive">
            <table class="table text-center table-hover">
                <thead class="table-dark">
                <tr>
                <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Data de Abertura</th>
                    <th></th>
                </tr>
                </thead>
                
                <tbody>
                @foreach($ordens as $key => $ordem)
                    <tr>
                        <td>{{$ordem->ordem_id}}</td>
                        <td>{{$ordem->cliente}}</td>
                        <td>{{$ordem->servico}}</td>
                        <td>{{$data_formatada}}</td>
                        <!-- DELETAR -->
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm btn_acao"  data-bs-toggle="modal" data-bs-target="#deletarordem{{$ordem->ordem_id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                        </td>
                        <!-- MODAL DELETAR solicitação -->
                        <div class="modal fade" id="deletarordem{{$ordem->ordem_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <p class="text-muted">Confirme se deseja deletar essa solicitação de serviço</p>
                                        <p>cliente: {{$ordem->cliente}}</p>
                                        <p>Data de abertura: {{$data_formatada}}</p>
                                        <p>serviço: {{$ordem->servico}}</p>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                                            <a class="btn btn-danger" href="/solicita/delete/{{$ordem->ordem_id}}">Deletar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim delete -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif


    <div class="container text-center">
        <button data-bs-toggle="modal" data-bs-target="#solicitaordem" type="button" class="btn btn-primary">Solicitar serviço</button>
    </div>
@else

    <div class="container text-center">
        <h1 class="text-muted display-6">Não há clientes ou serviços disponível para solicitar um serviço</h1>
    </div>

@endif
<!--MODAL solicita ordem-->
<div class="modal fade" id="solicitaordem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/solicita/inserir">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12 mb-3">
                        <label for="cliente">Clientes <span class="text-danger">*</span></label>
                        <select name="cliente" id="cliente" class="form-control" required>
                          @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="cliente">Data Abertura<span class="text-danger">*</span></label>
                        <input type="date" name="data_abertura" class="form-control" value="{{date('d/m/Y')}}" required>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="servico">Serviços <span class="text-danger">*</span></label>
                        <select name="servico" id="servico" class="form-control" required>
                              @foreach($servicos as $servico)
                                <option value="{{$servico->id}}">{{$servico->nome}}</option>
                              @endforeach
                        </select>
                    </div>

                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Inserir</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection