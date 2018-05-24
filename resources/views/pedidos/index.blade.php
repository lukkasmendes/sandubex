@extends('adminlte::page')
@include('pedidos.create')
@section('title', 'Sandubex')
@section('content_header')

    {!! Html::script('js/js/angular.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('js/js/app.js', array('type' => 'text/javascript')) !!}

    @if (Session::has('mensagem-sucesso'))
        <div class="card-panel green">
            <strong>{{ Session::get('mensagem-sucesso') }}</strong>
        </div>
    @endif
    @if (Session::has('mensagem-falha'))
        <div class="card-panel red">
            <strong>{{ Session::get('mensagem-falha') }}</strong>
        </div>
    @endif

    <div class="well well-sm" style="width: 380px; float: left;">
        <div style="float: left; width: 90%">
            <script src="{{asset('js/jquery.min.js')}}"></script>
            <script src="{{asset('js/select.js')}}"></script>

            <input type="text" name="searchname" class="form-control" id="searchname" placeholder="Digite NOME ou CPF do cliente" onkeyup="this.value!=''?pag.disabled=false:pag.disabled=true">

            <script src="{{asset('js/jquery-ui.js')}}"></script>
            <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
        </div>

        <div class="input-group-addon no-print" style="padding: 2px 5px; float: none; width: 1px">
            <a href="#"
               data-toggle="modal"
               title="Novo Cliente"
               id="add-customer"
               class="external"
               data-target="#novoCliente2"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i>
            </a>
        </div>

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
    </div>

    <input type="text" name="search" placeholder="Pesquise aqui os produtos pelo nome" data-search style="width: 300px">

    <div class="filtr-container" style="width: 70%; float: right;  background-color: white">
        @foreach($produtos as $pro)

            <div class="filtr-item"
                 data-category="{{$pro->id}}"
                 name="{{$pro->id}}"
                 id="field"
                 data-field-id="{{$pro->id}}"
                 data-sort="{{$pro->categoria->descricao}}">

                <form method="POST" action="{{ route('pedidos.adicionar') }}">
                    {{ csrf_field() }}

                    <input type="hidden" id="idr" name="idr" value="{{ $pro->id }}">

                    @if($pro->estoque == null || $pro->estoque->quantidade == 0)
                        <button style="background:  transparent;" disabled="disabled"
                                data-name="produtos"
                                title="Clique para adicionar este produto ao pedido"
                                class="btn btn-both btn-flat">

                            <img name="{{$pro->nome}}" src="produtos/{{$pro->id}}/image" style="width: 100px; height: 100px;"/>
                            <br/>
                            <span style="width:150px;display:inline-block;">{{$pro->nome}}</span><br/>
                            <span style="width:150px;display:inline-block;">
                                <?php
                                    if($pro->estoque == null || $pro->estoque->quantidade == 0 ){
                                        echo 'Indispónível';
                                    }else{
                                        echo 'Disponível: '. $pro->estoque->quantidade .' '. $pro->unidade;
                                    }
                                ?>
                            </span>
                        </button>
                    @else
                        <button style="background: transparent;"
                                data-name="produtos"
                                title="Clique para adicionar este produto ao pedido"
                                class="btn btn-both btn-flat"
                                onclick="alterar_div()"
                                value="{{$pro->id}}"
                                id="prod1"
                                name="{{$pro->id}}">

                            <img name="{{$pro->nome}}" src="produtos/{{$pro->id}}/image" style="width: 100px; height: 100px;"/>
                            <br/>
                            <span style="width:150px;display:inline-block;">{{$pro->nome}}</span><br/>
                            <span style="width:150px;display:inline-block;">
                        <?php
                            if($pro->estoque == null || $pro->estoque->quantidade == 0 ){
                                echo 'Indispónível';
                            }else{
                                echo 'Disponível: '. $pro->estoque->quantidade .' '. $pro->unidade;
                            }
                        ?>
                    </span>
                        </button>
                    @endif

                </form>

            </div>
        @endforeach
    </div>

    <form id="form-remover-produto" method="POST" action="{{ route('pedidos.remover') }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="pedido_id">
        <input type="hidden" name="produto_id">
        <input type="hidden" name="item">
    </form>
    <form id="form-adicionar-produto" method="POST" action="{{ route('pedidos.adicionar') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id">
    </form>

{!! $produtos->links() !!}


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>

        <div id="conteudo">Este conteúdo será alterado</div>
        Qual é seu nome? <input type="text" id="seu_nome">

        <button type="button" onclick="alterar_div()">Alterar</button>

    <script src="{{asset('js/refresh.js')}}"></script>


@endsection

@section('scripts')

<!-- PEGA VALOR SELECIONADO NO SELECT DE PAGAR-EM E ADD NO INPUT HIDDEN -->
    <script>
        $('#ipagar_em').on('change', function() {
            $('#pagamento #pagar_em').val($(this).find('option:selected').text());
            $('#pagamento');
        });
    </script>
<!-- PEGA VALOR SELECIONADO NO SELECT DE PAGAR-EM E ADD NO INPUT HIDDEN -->

<!-- CALCULA O TROCO NO MODAL -->
    <script type="text/javascript">
        function calcular() {
            var pag = "<?php echo $total_pedido; ?>";

            var valor_unitario = parseFloat(document.getElementById('valor_unitario').value);
            var resultado = parseFloat(document.getElementById('resultado').value);
            var total = parseFloat(document.getElementById('total').value);
            var pagar = parseFloat(document.getElementById('pagar').value);

            document.getElementById('resultado').innerHTML = valor_unitario;

            document.getElementById('total').innerHTML = valor_unitario - pag;
        }
    </script>
<!-- CALCULA O TROCO NO MODAL -->

<!-- AZIBIÇÃO DOS PRODUTOS -->
    <script>
        var filterizd = $('.filtr-container').filterizr({
            //options object
        });

        // Default options
        var options = {
            animationDuration: 0.5, // in seconds
            filter: 'all', // Initial filter
            callbacks: {
                onFilteringStart: function() { },
                onFilteringEnd: function() { },
                onShufflingStart: function() { },
                onShufflingEnd: function() { },
                onSortingStart: function() { },
                onSortingEnd: function() { }
            },
            controlsSelector: '', // Selector for custom controls
            delay: 0, // Transition delay in ms
            delayMode: 'progressive', // 'progressive' or 'alternate'
            easing: 'ease-out',
            filterOutCss: { // Filtering out animation
                opacity: 0,
                transform: 'scale(0.5)'
            },
            filterInCss: { // Filtering in animation
                opacity: 0,
                transform: 'scale(1)'
            },
            layout: 'sameSize', // See layouts
            multifilterLogicalOperator: 'or',
            selector: '.filtr-container',
            setupControls: true // Should be false if controlsSelector is set
        }
        // You can override any of these options and then call...
        var filterizd = $('.filtr-container').filterizr(options);
        // If you have already instantiated your Filterizr then call...
        filterizd.filterizr('setOptions', options);
    </script>
<!-- AZIBIÇÃO DOS PRODUTOS -->

<!-- ADICIONA E REMOVE PRODUTOS DA TABELA -->
    <script type="text/javascript" src="/js/carrinho.js"></script>
<!-- ADICIONA E REMOVE PRODUTOS DA TABELA -->

@endsection