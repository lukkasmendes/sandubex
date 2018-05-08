@extends('adminlte::page')

@include('pedidos.create')

@section('title', 'Sandubex')

@section('content_header')
    {!! Html::script('js/js/angular.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('js/js/app.js', array('type' => 'text/javascript')) !!}


<div class="well well-sm" style="width: 380px; float: left;">



    <div style="float: left; width: 90%">
        <select name="cliente_id" id="clienteid"
                data-placeholder="Selecione Cliente" required="required"
                class="form-control select2 select2-hidden-accessible"
                style="width:100%;" tabindex="-1" aria-hidden="true">

            <option>DIGITE NOME OU CPF DO CLIENTE</option>

            @foreach($data as $cli)
                <option value="{{ $cli->id }}">
                    {{ $cli->nome}}
                    ({{$cli->cpf}})
                </option>
            @endforeach

        </select>
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



    <div>
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

                                        @foreach($produtos as $pro)

                                            <?php
                                                $results = DB::select("select distinct e.quantidade
                                                            from estoques e, produtos p, pedido_produtos pp
                                                            where pp.produto_id = p.id
                                                            and e.produto_id = p.id
                                                            and pp.status = 'RE'
                                                            and pp.produto_id = $pedido_produto->produto_id");
                                                echo $results;
                                            ?>

                                            @if($result == 0)

                                                <a class="col l4 m4 s4" disabled="disabled"
                                                   href="#"
                                                   onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                                    <i class="fa fa-plus-circle" title="Adicionar 1"></i>
                                                </a>

                                            @else

                                                <a class="col l4 m4 s4"
                                                   href="#"
                                                   onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                                    <i class="fa fa-plus-circle" title="Adicionar 1"></i>
                                                </a>

                                            @endif
                                        @endforeach

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
                        <tr><td colspan="5" align="center"><h5>Nenhum produto adicionado</h5></td></tr>
                    @endforelse
                </tbody>




                <tfoot>
                    <tr class="success">
                        <td colspan="2" style="font-weight:bold;">Total a Pagar</td>

                        <td class="text-right" colspan="3" style="font-weight:bold;"><span id="total-payable">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button"
                                    class="btn btn-danger btn-block btn-flat"
                                    id="reset"
                                    onClick="document.location.reload(true)">Cancelar</button>
                        </td>
                        <td colspan="4">
                            <button type="button" class="btn btn-success btn-block btn-flat"
                                    data-toggle="modal"
                                    data-target="#pagamento">Pagamento</button>
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
                 data-sort="{{$pro->categoria->descricao}}"
                 onclick="AddTableRow({{$pro->id}})">

                <form method="POST" action="{{ route('pedidos.adicionar') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $pro->id }}">

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
                                        echo 'Disponível: '. $pro->estoque->quantidade . $pro->unidade;
                                    }
                                ?>
                                </span>
                        </button>
                    @else
                        <button style="background:  transparent;"
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
                                        echo 'Disponível: '. $pro->estoque->quantidade . $pro->unidade;
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
                                        <textarea name="note" id="note" class="pa form-control kb-text"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        Valor Pago
                                        <input name="valor_unitario" type="text" id="valor_unitario" onkeyup="calcular(this.value)"
                                               class="pa form-control kb-pad"/>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        Pagar em
                                        <select id="paid_by" class="form-control paid_by select2" style="width:100%;">
                                            <option value="cash">Dinheiro</option>
                                            <option value="CC">Cartão de Crédito</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="stripe">Cartão de Débito</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--
                        <div class="col-xs-3 text-center">

                            <div class="btn-group btn-group-vertical" style="width:100%;">
                                <button type="button" class="btn btn-info btn-block quick-cash" id="quick-payable">0.00
                                </button>


                                <a class="btn btn-block btn-warning" href=# id="num10" value="10" onblur="calcular(10);">
                                            <span class="pull-right label label-default">1</span>
                                    10</a>

                                <a class="btn btn-block btn-warning" href=# id="num20" value="20" onblur="calcular(20);">
                                            <span class="pull-right label label-default">1</span>
                                    20</a>

                                <a class="btn btn-block btn-warning" href=#>
                                            <span class="pull-right label label-default">1</span>
                                    50</a>

                                <a class="btn btn-block btn-warning" href=#>
                                            <span class="pull-right label label-default">1</span>
                                    100</a>

                                <a class="btn btn-block btn-warning" href=#>
                                            <span class="pull-right label label-default">1</span>
                                    500</a>



                                <button type="button" class="btn btn-block btn-warning">500</button>
                                <button type="button" class="btn btn-block btn-danger"
                                        id="clear-cash-notes">Limpar</button>
                            </div>
                        </div>
-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Fechar </button>
                    <button class="btn btn-primary" id="submit-sale">Enviar</button>
                </div>
            </div>
        </div>
    </div>

<!-- MODAL DE PAGAMENTO -->





@endsection


@section('scripts')

    <script type="text/javascript">
        function calcular() {
            var pag = "<?php echo $total_pedido; ?>";

            var valor_unitario = parseInt(document.getElementById('valor_unitario').value);
            var resultado = parseInt(document.getElementById('resultado').value);
            var total = parseInt(document.getElementById('total').value);
            var pagar = parseInt(document.getElementById('pagar').value);

            document.getElementById('resultado').innerHTML = valor_unitario;

            document.getElementById('total').innerHTML = valor_unitario - pag;
        }
    </script>




    <script type="text/javascript">
        $(document).ready(function () {
            $("#clienteid").select2();
        });
    </script>





    <script>
        function myFunction() {
            // Declare variables
            var input, filter, ul, li, a, i;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>






    <script>
        (function($) {
            AddTableRow = function() {

                var fieldId = $('#field').data("field-id");
                var cols = "";
                cols += '@foreach($produtos as $prod)';

                var newRow = $("<tr id='"+console.log(fieldId)+"'>");

                    cols += '<td>{{$pro->nome}}</td>';
                    cols += '<td>{{$prod->precoVenda}}</td>';
                    cols += '<td><input type="text" id="1" value="1" style="width: 30px; text-align: center" onclick="this.select();"></td>';
                    cols += '<td>{{$prod->precoVenda*2}}</td>';
                    cols += '<td>';
                    cols += '<a onclick="RemoveTableRow(this)"><i class="fa fa-trash-o" title="Remover"></i></a>';
                    cols += '</td>';
                    cols += '</tr>';

                cols += '@endforeach';


            newRow.append(cols);
            $("#products-table").append(newRow);
            return false;
            };

            RemoveTableRow = function(handler) {
                var tr = $(handler).closest('tr');

                tr.fadeOut(400, function(){
                    tr.remove();
                });

                return false;
            };
        })(jQuery);
    </script>







    <!-- FUÇANDO NO PDV -->









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






    <script type="text/javascript" src="/js/carrinho.js"></script>





    <!-- FUÇANDO NO PDV -->

@endsection