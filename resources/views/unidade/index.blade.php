@extends('layouts.app')

@section('content')
    <div class="row my-4 borda-bottom">
        <div class="col-md-9">
            <h3 class="text-center">Unidades - {{$instituicao->nome}}</h3>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary w-100 pb-1" data-toggle="modal" data-target="#cadastroModal">
                Cadastrar Unidade
            </button>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th class="w-25 text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unidades as $unidade)
            <tr>
                <td>{{$unidade->nome}}</td>
                <td class="text-center">
                    <a class="btn btn-group" href="{{route('departamento.index', ['unidade_id' => $unidade->id])}}"><i class="fa-solid fa-up-right-from-square"></i></a>
                    <button class="btn btn-group" type="button" data-toggle="modal" data-target="#editModal_{{$unidade->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                    <a class="btn btn-group text-danger" href="{{route('unidade.delete', ['unidade_id' => $unidade->id])}}"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row my-3">
        <div class="col-md-3">
            <a href="{{route('instituicao.index')}}" class="btn btn-secondary w-100">
                {{ __('Voltar') }}
            </a>
        </div>
    </div>



    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Unidade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('unidade.store') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="instituicao_id" value="{{$instituicao->id}}">
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-10">
                                <label for="nome">Nome da Unidade:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required autocomplete="nome"
                                       autofocus>
                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($unidades as $unidade)
        <div class="modal fade" id="editModal_{{$unidade->id}}" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cadastroModalLabel">Editar Unidade</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('unidade.update') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$unidade->id}}">
                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-10">
                                    <label for="nome">Nome da Unidade:</label>
                                    <input class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ $unidade->nome }}" required autocomplete="nome"
                                           autofocus>
                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $('.table').DataTable({
            searching: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "search": "Pesquisar",
                "infoEmpty": "",
                "zeroRecords": "Nenhuma Unidade Cadastrada nesta Instituição.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "order": [],
            "columnDefs": [{
                "targets": [0, 1],
                "orderable": false
            }]
        });
    </script>
@endsection
