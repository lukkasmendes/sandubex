@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')
    <div class="container">
        <h3 align="center"><i class="fas fa-barcode"></i> Produtos</h3>


        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>UN</th>
                    <th>Preço de Venda</th>
                    <th>Preço de Custo</th>
                    <th>Estoque Minimo</th>
                    <th>Estoque Atual</th>
                    <th>Validade</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th width="10px">
                        <a href="{{route('produtos.create')}}">
                            <button type="button" class="btn">
                                <i class="fas fa-barcode"></i> Novo Produto
                            </button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $pro)
                    @foreach($estoques as $est)

                        <tr align="center">
                            <td width="1%" nowrap="nowrap">{{$pro->id}}</td>
                            <td>{{$pro->nome}}</td>
                            <td width="1%" nowrap="nowrap">{{$pro->categoria->descricao}}</td>
                            <td width="1%" nowrap="nowrap">{{$pro->unidade}}</td>
                            <td>R$ {{number_format($pro->precoVenda, 2)}}</td>




<!-- <td>R$ {{number_format($pro->precoCusto, 2)}}</td> -->

                            @if($pro->id == $est->produto_id)
                                <td>R$ {{number_format($est->precoCusto, 2)}}</td>
                            @else
                                <td>R$ {{number_format($pro->precoCusto, 2)}}</td>
                            @endif



                            <td>{{$pro->estoqueMin}}</td>




<!-- <td>{{$pro->estoque}}</td> -->

                            @if($pro->id == $est->produto_id)
                                @if($est->quantidade < $pro->estoqueMin)
                                    <td bgcolor="red">{{$est->quantidade}}</td>
                                @else
                                    <td>{{$est->quantidade}}</td>
                                @endif
                            @else
                                @if($pro->estoque < $pro->estoqueMin)
                                    <td bgcolor="red">{{$pro->estoque}}</td>
                                @else
                                    <td>{{$pro->estoque}}</td>
                                @endif
                            @endif





                            <td>{{$pro->validade}}</td>
                            <td>{{$pro->descricao}}</td>
                            <td width="1%" nowrap="nowrap"><img src="produtos/{{$pro->id}}/image" width="60" height="60"/></td>
                            <td width="1%" nowrap="nowrap">

                                <a href="{{route('produtos.edit', ['id'=>$pro->id])}}"
                                   class="btn-sm btn-success" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

<!-- BOTÃO MODAL EXCLUIR -->

                                <a  href=""
                                    title="Excluir"
                                    class="modal-del btn-danger btn-sm"
                                    data-toggle="modal"
                                    data-target="#id{{$pro->id}}">

                                    <i class="fas fa-remove"></i>
                                </a>

<!-- BOTÃO MODAL EXCLUIR -->



<!-- MODAL EXCLUIR -->

                                <div    class="modal modal-danger fade"
                                        id="id{{ $pro->id}}"
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
                                                    EXCLUIR PRODUTO: {{$pro->nome}}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                TEM CERTEZA QUE DESEJA EXCLUIR?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('produtos.destroy', [$pro->id] )}}">
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
                @endforeach
            </tbody>
        </table>
    </div>
@endsection