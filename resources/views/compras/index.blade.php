@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')
    <div class="container">
        <h1><i class="fas fa-shopping-cart"></i> Compras</h1>



<!--  MODAL NOVA COMPRA -->
        <div class="modal fade" id="novaCompra" tabindex="-1" role="dialog" aria-labelledby="novaCompraModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="novaCompraModal">Nova Compra</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <script type="text/javascript">

                                function maiuscula(obj) {
                                    obj.value = obj.value.toUpperCase();
                                }

                            </script>

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {!! Form::open(['route' => 'compras.store']) !!}
                            <div class="form-group">
                                {!! Form::label('dataEntrada', 'DATA ENTRADA:') !!}
                                {!! Form::dateTime('dataEntrada', $dataEntrada = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('quantidade', 'QUANTIDADE:') !!}
                                {!! Form::text('quantidade', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('precoCusto', 'PREÇO DE CUSTO:') !!}
                                {!! Form::text('precoCusto', '0.00', ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('fornecedor_id', 'Fornecedor:') !!}
                                {{ Form::select('fornecedor_id',
                                   \App\Fornecedor::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
                                   ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('produto_id', 'Produto:') !!}
                                {{ Form::select('produto_id',
                                   \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
                                   ['class'=>'form-control']) }}
                            </div>
                        </p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => 'compras.store']) !!}

                        <a
                                type="button"
                                class="btn btn-danger"
                                data-dismiss="modal">
                            Cancelar
                        </a>

                        {!! Form::submit('Registrar Compra', ['class'=>'btn btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
<!--  MODAL NOVA COMPRA -->



        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Data Entrada</th>
                    <th>Quantidade</th>
                    <th>Preço de Custo</th>
                    <th>Total Gasto</th>
                    <th>Fornecedor</th>
                    <th>Produto</th>
                    <th>
                        <a>
                            <button type="button"
                                    class="btn"
                                    data-toggle="modal"
                                    data-target="#novaCompra">
                                <i class="fas fa-cart-plus"></i> Nova Compra
                            </button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $com)
                    <tr align="center">
                        <td width="1%" nowrap="nowrap">{{$com->id}}</td>
                        <td>{{$com->dataEntrada}}</td>
                        <td>{{$com->quantidade}}</td>
                        <td>R$ {{number_format($com->precoCusto, 2)}}</td>
                        <td>R$ {{number_format($com->quantidade*$com->precoCusto, 2)}}</td>
                        <td width="1%" nowrap="nowrap">{{$com->fornecedor->nome}}</td>
                        <td width="1%" nowrap="nowrap">{{$com->produto->nome}}</td>
                        <td width="1%" nowrap="nowrap">
                            <a href="{{route('compras.edit', ['id'=>$com->id])}}"
                               class="btn-sm btn-success"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>


<!-- BOTÃO MODAL EXCLUIR -->

                            <a  href=""
                                title="Excluir"
                                class="modal-del btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#id{{$com->id}}">

                                <i class="fas fa-remove"></i>
                            </a>

<!-- BOTÃO MODAL EXCLUIR -->



<!-- MODAL EXCLUIR -->

                            <div    class="modal modal-danger fade"
                                    id="id{{ $com->id}}"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title text-center" id="myModalLabel">
                                                EXCLUIR COMPRA: {{$com->produto->nome}}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            TEM CERTEZA QUE DESEJA EXCLUIR?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('compras.destroy', [$com->id] )}}">
                                                {{method_field('delete')}}

                                                <button
                                                        type="button"
                                                        class="btn btn-success"
                                                        data-dismiss="modal">
                                                    Não, Cancelar
                                                </button>

                                                <button
                                                        type="submit"
                                                        class="btn btn-warning">
                                                    Sim, Excluir
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- MODAL EXCLUIR -->



                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $compras->links() !!}</center>
    </div>
@endsection