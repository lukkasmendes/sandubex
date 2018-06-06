<div id="conteudo">
    <table class="table table-striped table-condensed table-hover list-table" id="products-tableTESTANDO" style=" margin-bottom: 0;">
        <thead>
            <tr class="success">
                <th>Produto</th>
                <th style="width: 19%;text-align:center;">Preço</th>
                <th style="width: 19%;text-align:center;">Qtd</th>
                <th style="width: 20%;text-align:center;">Subtotal</th>
                <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
            </tr>
        </thead>

        @php
            $total_pedido = 0;
            $contador = 0;
        @endphp

        <tbody>
            <div id="conteudo">
                @forelse ($pedidos as $pedido)
                    @foreach ($pedido->pedido_produtos as $pedido_produto)
                        <tr>
                            <td>{{$pedido_produto->produto->nome}}</td>
                            <td >R$ {{ number_format($pedido_produto->produto->precoVenda, 2, ',', '.') }}</td>
                            <td align="center">
                                <div class="center-align">
                                    <a class="col l4 m4 s4"
                                       href="#"
                                       onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
                                        <i class="fa fa-minus-circle" title="Remover 1"></i>
                                    </a>
                                    <span style="width:19px;display:inline-block;"> {{ $pedido_produto->qtd }} </span>
                                    <?php
                                    $conn = mysqli_connect("localhost","root","root","sandubex");

                                    $sql = mysqli_query($conn, "select distinct e.quantidade as quantidade
                                                                        from estoques e, produtos p, pedido_produtos pp
                                                                        where pp.produto_id = p.id
                                                                        and e.produto_id = p.id
                                                                        and pp.status = 'RE'
                                                                        and pp.produto_id = $pedido_produto->produto_id");

                                    $row = mysqli_fetch_array($sql);
                                    $quanti = $row['quantidade'];

                                    $conn = mysqli_close($conn);
                                    ?>
                                    @if($quanti <= 0)
                                        <span class="col l4 m4 s4">
                                                        <i class="fa fa-plus-circle" title="Estoque Indisponível"></i>
                                                    </span>
                                    @else
                                        <a class="col l4 m4 s4"
                                           href="#"
                                           onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                            <i class="fa fa-plus-circle" title="Adicionar 1"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            @php
                                $total_produto = $pedido_produto->valores;
                                $total_pedido += $total_produto;

                                $contador += $pedido_produto->qtd;
                            @endphp
                            <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                            <td>
                                <a href="#"
                                   onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)">
                                    <i class="fa fa-trash-o" title="Remover"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="5" align="center">
                            <h5>Nenhum produto adicionado</h5>
                        </td>
                    </tr>
                @endforelse
            </div>
        </tbody>

        <tfoot>
            <tr class="success">
                <td colspan="2" style="font-weight:bold;">Total a Pagar
                </td>
                <td class="text-right" colspan="3" style="font-weight:bold;">
                    <span id="total-payable">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <form method="POST" action="{{ route('pedidos.cancelar') }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id">
                        <button class="btn btn-danger btn-block btn-flat">
                            Cancelar
                        </button>
                    </form>
                </td>
                <td colspan="4">
                    <button type="button"
                            class="btn btn-success btn-block btn-flat"
                            data-toggle="modal"
                            data-target="#pagamento"
                            name="pag"
                            id="pag"
                            title="Selecione um cliente antes de efetuar o pagamento"
                            disabled>
                        Pagamento
                    </button>

                    <!-- MODAL DE PAGAMENTO -->
                    <div class="modal" data-easein="flipYIn" id="pagamento" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-success">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <h4 class="modal-title" id="payModalLabel">
                                        Pagamento
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="font16">
                                                <table class="table table-bordered table-condensed" style="margin-bottom: 0;">
                                                    <tbody>
                                                    <tr style="background-color: white">
                                                        <td width="25%" style="border-right-color: #FFF !important;">Total de itens</td>
                                                        <td width="25%" class="text-right"><span id="item_count">{{ $contador }}</span></td>
                                                        <td width="25%" style="border-right-color: #FFF !important;">Total a pagar</td>
                                                        <td width="25%" class="text-right"><span id="pagar" name="pagar">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span></td>
                                                    </tr>
                                                    <tr style="background-color: white">
                                                        <td style="border-right-color: #FFF !important;">Total pago</td>
                                                        <td class="text-right">R$ <span id="resultado" name="resultado" onblur="calcular()">0.00</span></td>
                                                        <td style="border-right-color: #FFF !important;">Troco</td>
                                                        <td class="text-right">R$ <span id="total" name="total" onblur="calcular()">0.00</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        Informações
                                                        <textarea id="obs1" name="obs1" class="pa form-control kb-text" onkeyup="info()"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        Valor Pago
                                                        <input name="valor_unitario" type="text" id="valor_unitario" onkeyup="calcular(this.value)" placeholder="0.00"
                                                               class="pa form-control kb-pad"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        Pagar em
                                                        <select name="ipagar_em" id="ipagar_em" class="form-control" style="width:100%;" onclick="this.value!=''?btnenv.disabled=false:btnenv.disabled=true">
                                                            <option id="S" disabled selected>Selecione</option>
                                                            <option value="1" id="D" name="D">Dinheiro</option>
                                                            <option value="2" id="C" name="C">Cheque</option>
                                                            <option value="3" id="CC" name="CC">Cartão de Crédito</option>
                                                            <option value="4" id="CD" name="CD">Cartão de Débito</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Fechar </button>

                                    @if($contador == 0)
                                        <button class="btn btn-primary" title="Nenhum produto adicionado" id="submit-sale" disabled>Enviar</button>
                                    @else
                                        <form method="POST" action="{{ route('pedidos.concluir') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                            <input type="hidden" name="cliente_id" value="id" id="id">
                                            <input type="hidden" id="obs" name="obs" value="">

                                            <span type="hidden" id="spanobs" name="spanobs" value="" style="visibility: hidden"></span>
                                            <input type="hidden" id="pagar_em" name="pagar_em" value="">

                                            <button class="btn btn-primary" title="Selecione a forma de pagamento antes de finalizar" id="btnenv" disabled>Enviar</button>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL DE PAGAMENTO -->
                </td>
            </tr>
        </tfoot>
    </table>
</div>