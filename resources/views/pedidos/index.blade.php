@extends('adminlte::page')

@include('clientes.create')

@section('title', 'Sandubex')

@section('content_header')


    <div>

            <div class="col-lg-12 alerts" style="display: none;">
            </div>

            <table style="width:100%;" class="layout-table">
                <tbody>
                <tr>
                    <td style="width: 460px;">

                        <div>
                            <form action="http://www.scriptphp.ga/pdv/pos" id="pos-sale-form" method="post" accept-charset="utf-8">
                                <div class="well well-sm" id="leftdiv" style="height: 380px;">
                                    <div id="lefttop" style="margin-bottom:5px;">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                @foreach($clientes as $cli)

<!-- Select2 -->

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

<!-- Select2 -->


                                                    <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                                        <a href="#"
                                                           data-toggle="modal"
                                                           title="Novo Cliente"
                                                           id="add-customer"
                                                           class="external"
                                                           data-target="#novoCliente"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <input type="text" name="code" id="add_item" class="form-control ui-autocomplete-input" placeholder="Procure o produto pelo código ou nome" autocomplete="off">
                                        </div>
                                    </div>
                                    <div id="print">
                                        <div id="list-table-div" class="ps-container" data-ps-id="50f3f54d-c69e-6739-eeb3-eae683cf4c8c" style="height: 118px;">
                                            <table id="posTable" class="table table-striped table-condensed table-hover list-table" style="margin:0;">
                                                <thead>
                                                <tr class="success">
                                                    <th>Produto</th>
                                                    <th style="width: 15%;text-align:center;">Preço</th>
                                                    <th style="width: 15%;text-align:center;">Qtd</th>
                                                    <th style="width: 20%;text-align:center;">Subtotal</th>
                                                    <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="1523538124031" class="25" data-item-id="25" style="width: 600px;">
                                                        <td>
                                                            <input name="product_id[]" type="hidden" class="rid" value="25">
                                                            <button type="button"
                                                                    class="btn bg-purple btn-block btn-xs edit"
                                                                    id="1523538124031"
                                                                    data-item="25">
                                                                <span class="sname" id="name_1523538124031">X Salada (2001)</span>
                                                            </button>
                                                        </td>
                                                        <td class="text-right">
                                                            <input class="realuprice"
                                                                   name="real_unit_price[]" type="hidden" value="8.00">
                                                            <input class="rdiscount"
                                                                   name="product_discount[]" type="hidden" id="discount_1523538124031" value="0">
                                                            <span class="text-right sprice" id="sprice_1523538124031">8.00</span>
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-qty kb-pad text-center rquantity"
                                                                   name="quantity[]" type="text"
                                                                   value="1" data-id="1523538124031" data-item="25" id="quantity_1523538124031"
                                                                   onclick="this.select();"></td><td class="text-right">
                                                            <span class="text-right ssubtotal" id="subtotal_1523538124031">8.00</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <i class="fa fa-trash-o tip pointer posdel" id="1523538124031" title="Remove"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; display: block;">
                                                <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; display: block;">
                                                <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                        <div id="totaldiv">
                                            <table id="totaltbl" class="table table-condensed totals" style="margin-bottom:10px;">
                                                <tbody>
                                                <tr class="info">
                                                    <td width="25%">Total de Itens</td>
                                                    <td class="text-right" style="padding-right:10px;"><span id="count">1 (1.00)</span></td>
                                                    <td width="25%">Total</td>
                                                    <td class="text-right" colspan="2"><span id="total">8.00</span></td>
                                                </tr>
                                                <tr class="success">
                                                    <td colspan="2" style="font-weight:bold;">Total a Pagar</td>
                                                    <td class="text-right" colspan="2" style="font-weight:bold;"><span id="total-payable">8.00</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="botbuttons" class="col-xs-12 text-center">
                                        <div class="row">
                                            <div class="col-xs-4" style="padding: 0;">
                                                <div class="btn-group-vertical btn-block">
                                                    <button type="button" class="btn btn-warning btn-block btn-flat" id="suspend">       </button>
                                                    <button type="button" class="btn btn-danger btn-block btn-flat" id="reset">Cancelar</button>
                                                </div>

                                            </div>
                                            <div class="col-xs-4" style="padding: 0 5px;">
                                                <div class="btn-group-vertical btn-block">
                                                    <button type="button" class="btn bg-purple btn-block btn-flat" id="print_order">       </button>

                                                    <button type="button" class="btn bg-navy btn-block btn-flat" id="print_bill">           </button>
                                                </div>
                                            </div>
                                            <div class="col-xs-4" style="padding: 0;">
                                                <button type="button" class="btn btn-success btn-block btn-flat" id="payment" style="height:67px;">Pagamento</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>

                    </td>

                    <td>
                        <div class="contents" id="right-col" style="height: 399px;">
                            <div id="item-list">
                                <div class="items ps-container" data-ps-id="5636156a-b08b-d719-2670-e1d991c352b7" style="height: 400px;">
                                    <div>

                                        <button type="button" data-name="Coca-cola" id="product-0426" value="0100"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/dace00043bcfc91e39817cd9699e3978.jpg"
                                                     alt="Coca-cola" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>Coca-cola</span>
                                            </span>
                                        </button>

                                        <button type="button" data-name="Suco de Laranja" id="product-0427" value="10002"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/4b454aa572638f4462345603009c8479.jpg"
                                                     alt="Suco de Laranja" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>Suco de Laranja</span>
                                            </span>
                                        </button>





                                        @foreach($produtos as $pro)
                                            <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                    class="btn btn-both btn-flat product">
                                                <span class="bg-img">
                                                    <img src="produtos/{{$pro->id}}/image" style="width: 100px; height: 100px;"/>
                                                </span><br/>
                                                    <span>
                                                    <span>{{$pro->nome}}</span>
                                                </span>
                                            </button>
                                        @endforeach



                                    </div>
                                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; display: block;">
                                        <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; display: block;">
                                        <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-nav">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button style="z-index:10002;" class="btn btn-warning pos-tip btn-flat" type="button" id="previous" disabled="disabled">
                                            <i class="fa fa-chevron-left"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button style="z-index:10004;" class="btn btn-warning pos-tip btn-flat" type="button" id="next" disabled="disabled">
                                            <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#clienteid").select2();
        });
    </script>

@endsection