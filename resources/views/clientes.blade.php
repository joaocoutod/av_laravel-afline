@extends('layouts.main')

@section('title', 'Cliente')

@section('content')
<div class="container text-center p-3">
    <h1 class="text-muted display-5">Lista de Clientes</h1>
</div>

@if(count($clientes) != 0)
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

    <div class="container  table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Complemento</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->rua}}</td>
                    <td>{{$cliente->numero}}</td>
                    <td>{{$cliente->complemento}}</td>
                    <td>{{$cliente->bairro}}</td>
                    <td>{{$cliente->cidade}}</td>
                    <td>{{$cliente->estado}}</td>
                    
                    <!-- EDITAR -->
                    <td class="text-center">
                        <a href="#" class="btn btn-primary btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#editCliente{{$cliente->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>
                        <!--MODAL EDITAR cliente-->
                        <div class="modal fade" id="editCliente{{$cliente->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content text-left">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="POST" action="/clientes/update">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$cliente->id}}">
                                        <div class="row g-3">
                                            <div class="col-sm-12 mb-3">
                                                <label for="nome">Nome <span class="text-danger">*</span></label>
                                                <input id="nome" type="text" class="form-control" name="nome" value="{{$cliente->nome}}" autofocus required>
                                            </div>

                                            <div class="col-sm-12 mb-3">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <input id="email" type="email" class="form-control" name="email" value="{{$cliente->email}}" autofocus required>
                                            </div>

                                            <div class="col-sm-6  mb-3">
                                                <label for="rua">Rua <span class="text-danger">*</span></label>
                                                <input id="rua" type="text" class="form-control" name="rua" value="{{$cliente->rua}}" autofocus required>
                                            </div>
                                            <div class="col-sm-6  mb-3">
                                                <label for="numero">Numero <span class="text-danger">*</span></label>
                                                <input id="numero" type="number" class="form-control" name="numero" value="{{$cliente->numero}}" autofocus required>
                                            </div>
                                            
                                            <div class="col-sm-12 mb-3">
                                                <label for="complemento">Complemento <span class="text-danger">*</span></label>
                                                <input id="complemento" type="text" class="form-control" name="complemento" value="{{$cliente->complemento}}" autofocus required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="bairro">Bairro <span class="text-danger">*</span></label>
                                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{$cliente->bairro}}" autofocus required>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <label for="cidade">Cidade <span class="text-danger">*</span></label>
                                                <input id="cidade" type="text" class="form-control" name="cidade" value="{{$cliente->cidade}}" autofocus required>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="estado">Estado <span class="text-danger">*</span></label>
                                                <input id="estado" type="text" class="form-control" name="estado" value="{{$cliente->estado}}" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-success">Alterar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <!-- DELETAR -->
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm btn_acao"  data-bs-toggle="modal" data-bs-target="#deletarCliente{{$cliente->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>

                        <!-- MODAL DELETAR cliente -->
                        <div class="modal fade" id="deletarCliente{{$cliente->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Confirme se deseja deletar o cliente de [id = {{$cliente->id}}]</p>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                                            <a class="btn btn-danger" href="/clientes/delete/{{$cliente->id}}">Deletar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td><!-- fim delete -->

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

    <div class="container text-center">
        <button data-bs-toggle="modal" data-bs-target="#inserirCliente" type="button" class="btn btn-primary">Inserir Cliente</button>
    </div>
    <!--MODAL INSERIR cliente-->
    <div class="modal fade" id="inserirCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/clientes/inserir">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-12 mb-3">
                            <label for="nome">Nome <span class="text-danger">*</span></label>
                            <input id="nome" type="text" class="form-control" name="nome" autofocus required>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control" name="email" autofocus required>
                        </div>

                        <div class="col-sm-6  mb-3">
                            <label for="rua">Rua <span class="text-danger">*</span></label>
                            <input id="rua" type="text" class="form-control" name="rua" autofocus required>
                        </div>
                        <div class="col-sm-6  mb-3">
                            <label for="numero">Numero <span class="text-danger">*</span></label>
                            <input id="numero" type="number" class="form-control" name="numero" autofocus required>
                        </div>
                        
                        <div class="col-sm-12 mb-3">
                            <label for="complemento">Complemento <span class="text-danger">*</span></label>
                            <input id="complemento" type="text" class="form-control" name="complemento" autofocus required>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="bairro">Bairro <span class="text-danger">*</span></label>
                            <input id="bairro" type="text" class="form-control" name="bairro" autofocus required>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="cidade">Cidade <span class="text-danger">*</span></label>
                            <input id="cidade" type="text" class="form-control" name="cidade" autofocus required>
                        </div>

                        <div class="col-sm-6">
                            <label for="estado">Estado <span class="text-danger">*</span></label>
                            <input id="estado" type="text" class="form-control" name="estado" autofocus required>
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

