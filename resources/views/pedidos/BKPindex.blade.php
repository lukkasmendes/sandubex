@extends('adminlte::page')

@include('compras.create')

@section('title', 'Sandubex')

@section('content_header')

<html class="ps-container ps-active-y" data-ps-id="c5fa6f4a-fdc7-b88a-f1ca-7563ca779575">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="http://www.scriptphp.ga/pdv/themes/default/assets/img/icon.png">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/iCheck/square/green.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/redactor/redactor.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/dist/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css">
        <link href="http://www.scriptphp.ga/pdv/themes/default/assets/dist/css/custom.css" rel="stylesheet" type="text/css">
        <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    </head>
    <body class="skin-green sidebar-collapse sidebar-mini pos">

    <div>

            <div class="col-lg-12 alerts" style="display: none;">
            </div>

            <table style="width:100%;" class="layout-table">
                <tbody>
                <tr>
                    <td style="width: 460px;">

                        <div id="pos">
                            <form action="http://www.scriptphp.ga/pdv/pos" id="pos-sale-form" method="post" accept-charset="utf-8">
                                <input type="hidden" name="spos_token" value="fea3290b1d7fd34620aa09245b8ec925" style="display:none;">
                                <div class="well well-sm" id="leftdiv">
                                    <div id="lefttop" style="margin-bottom:5px;">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <select name="customer_id" id="spos_customer" data-placeholder="Selecione Cliente" required="required" class="form-control select2 select2-hidden-accessible" style="width:100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1" selected="selected">Cliente Padrão</option>
                                                    <option value="5">John Martin</option>
                                                </select>
                                                <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;">
                                                    <span class="selection">
                                                        <span class="select2-selection select2-selection--single" role="combobox"
                                                              aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"
                                                              tabindex="0" aria-labelledby="select2-spos_customer-container">
                                                            <span class="select2-selection__rendered" id="select2-spos_customer-container"
                                                                  title="Cliente Padrão">Cliente Padrão</span>
                                                            <span class="select2-selection__arrow" role="presentation">
                                                                <b role="presentation"></b>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="dropdown-wrapper" aria-hidden="true">

                                                    </span>
                                                </span>
                                                <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                                    <a href="#" id="add-customer" class="external" data-toggle="modal" data-target="#myModal"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a>
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <input type="text" name="code" id="add_item" class="form-control ui-autocomplete-input" placeholder="Procure o produto pelo código, nome ou código de barras" autocomplete="off">
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
                                                    <tr id="1523538124031" class="25" data-item-id="25">
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
                                    <div class="clearfix"></div>
                                    <span id="hidesuspend"></span>
                                    <input type="hidden" name="spos_note" value="" id="spos_note">

                                    <div id="payment-con">
                                        <input type="hidden" name="amount" id="amount_val" value="">
                                        <input type="hidden" name="balance_amount" id="balance_val" value="-8">
                                        <input type="hidden" name="paid_by" id="paid_by_val" value="cash">
                                        <input type="hidden" name="cc_no" id="cc_no_val" value="">
                                        <input type="hidden" name="paying_gift_card_no" id="paying_gift_card_no_val" value="">
                                        <input type="hidden" name="cc_holder" id="cc_holder_val" value="">
                                        <input type="hidden" name="cheque_no" id="cheque_no_val" value="">
                                        <input type="hidden" name="cc_month" id="cc_month_val" value="">
                                        <input type="hidden" name="cc_year" id="cc_year_val" value="">
                                        <input type="hidden" name="cc_type" id="cc_type_val" value="">
                                        <input type="hidden" name="cc_cvv2" id="cc_cvv2_val" value="">
                                        <input type="hidden" name="balance" id="balance_val" value="">
                                        <input type="hidden" name="payment_note" id="payment_note_val" value="">
                                    </div>
                                    <input type="hidden" name="customer" id="customer" value="1">
                                    <input type="hidden" name="order_tax" id="tax_val" value="0%">
                                    <input type="hidden" name="order_discount" id="discount_val" value="0">
                                    <input type="hidden" name="count" id="total_item" value="">
                                    <input type="hidden" name="did" id="is_delete" value="0">
                                    <input type="hidden" name="eid" id="is_delete" value="0">
                                    <input type="hidden" name="hold_ref" id="hold_ref" value="">
                                    <input type="hidden" name="total_items" id="total_items" value="0">
                                    <input type="hidden" name="total_quantity" id="total_quantity" value="0">
                                    <input type="submit" id="submit" value="Submit Sale" style="display: none;">
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

                                        <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/7553774a681d9f37cf47f1a9ad793532.jpg"
                                                     alt="X Salada" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>X Salada</span>
                                            </span>
                                        </button>

                                        <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/7553774a681d9f37cf47f1a9ad793532.jpg"
                                                     alt="X Salada" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>X Salada</span>
                                            </span>
                                        </button>

                                        <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/7553774a681d9f37cf47f1a9ad793532.jpg"
                                                     alt="X Salada" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>X Salada</span>
                                            </span>
                                        </button>

                                        <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/7553774a681d9f37cf47f1a9ad793532.jpg"
                                                     alt="X Salada" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>X Salada</span>
                                            </span>
                                        </button>

                                        <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/7553774a681d9f37cf47f1a9ad793532.jpg"
                                                     alt="X Salada" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>X Salada</span>
                                            </span>
                                        </button>

                                        <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/7553774a681d9f37cf47f1a9ad793532.jpg"
                                                     alt="X Salada" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>X Salada</span>
                                            </span>
                                        </button>

                                        <button type="button" data-name="X Salada" id="product-0425" value="2001"
                                                class="btn btn-both btn-flat product">
                                            <span class="bg-img">
                                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/7553774a681d9f37cf47f1a9ad793532.jpg"
                                                     alt="X Salada" style="width: 100px; height: 100px;">
                                            </span><br/>
                                            <span>
                                                <span>X Salada</span>
                                            </span>
                                        </button>







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
                </tbody></table>
        </div>











    <aside class="control-sidebar control-sidebar-dark ps-container" id="categories-list" data-ps-id="0b10927f-5cf5-673d-dfc8-6f79e592d43d">
        <div class="tab-content">
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="#" class="category active" id="4">
                            <div class="menu-icon">
                                <img src="http://www.scriptphp.ga/pdv/uploads/thumbs/83677c335e8b47de3fe7073e2e3f25b1.jpg"
                                     alt=""
                                     class="img-thumbnail img-circle img-responsive">
                            </div>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">1000</h4>
                                <p>Geral</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
            <div class="ps-scrollbar-x" style="left: 0px; width: 0px;">

            </div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
            <div class="ps-scrollbar-y" style="top: 0px; height: 0px;">

            </div>
        </div>
    </aside>

    <div class="control-sidebar-bg" style="position: fixed; height: auto;">

    </div>


    <div id="order_tbl" style="display:none;">
        <span id="order_span">
            <span style="text-align:center;">
                <h3>Site de Vendas - PDV</h3>
                <h4>Order</h4>
                <h5>By: admin</h5>
                <h5>12/04/18 10:02:04 AM</h5>
            </span>
        </span>
        <table id="order-table" class="prT table table-striped table-condensed" style="width:100%;margin-bottom:0;">
            <tbody>
            <tr class="row_25" data-item-id="25">
                <td>#1 X Salada (2001)</td>
                <td>1</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="bill_tbl" style="display:none;">
        <span id="bill_span">
            <span style="text-align:center;">
                <h3>Site de Vendas - PDV</h3>
                <h4>Bill</h4>
                <h5>By: admin</h5>
                <h5>12/04/18 10:02:04 AM</h5>
            </span>
        </span>
        <table id="bill-table" width="100%"
               class="prT table table-striped table-condensed" style="width:100%;margin-bottom:0;">
            <tbody>
            <tr class="row_25" data-item-id="25">
                <td colspan="2">#1 X Salada (2001)</td>
            </tr>
            <tr class="row_25" data-item-id="25">
                <td>(1 x 8.00)</td>
                <td style="text-align:right;">8.00</td>
            </tr>
            </tbody>
        </table>
        <table id="bill-total-table" width="100%"
               class="prT table table-striped table-condensed" style="width:100%;margin-bottom:0;">
            <tbody>
            <tr>
                <td>Total</td>
                <td style="text-align:right;">8.00</td>
            </tr>
            <tr>
                <td>Total de Itens</td>
                <td style="text-align:right;">1 (1)</td>
            </tr>
            <tr>
                <td>Total Geral</td>
                <td style="text-align:right;">8.00</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="modal" data-easein="flipYIn" id="posModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>
    <div class="modal" data-easein="flipYIn" id="posModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">

    </div>
    <div id="ajaxCall" style="display: none;">
        <i class="fa fa-spinner fa-pulse"></i>
    </div>

    <div class="modal" data-easein="flipYIn" id="gcModal" tabindex="-1" role="dialog" aria-labelledby="mModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="opacity: 1; display: block;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">Vender Cartão da Loja</h4>
                </div>
                <div class="modal-body">
                    <p>Por favor, preencha as informações abaixo</p>

                    <div class="alert alert-danger gcerror-con" style="display: none;">
                        <button data-dismiss="alert" class="close" type="button">×</button>
                        <span id="gcerror"></span>
                    </div>
                    <div class="form-group">
                        <label for="gccard_no">Cartão No</label> *
                        <div class="input-group">
                            <input type="text" name="gccard_no" value="" class="form-control" id="gccard_no">
                            <div class="input-group-addon" style="padding-left: 10px; padding-right: 10px;"><a href="#" id="genNo"><i class="fa fa-cogs"></i></a></div>
                        </div>
                    </div>
                    <input type="hidden" name="gcname" value="Cartão da Loja" id="gcname">
                    <div class="form-group">
                        <label for="gcvalue">Valor</label> *
                        <input type="text" name="gcvalue" value="" class="form-control" id="gcvalue">
                    </div>
                    <div class="form-group">
                        <label for="gcprice">Preço</label> *
                        <input type="text" name="gcprice" value="" class="form-control" id="gcprice">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <button type="button" id="addGiftCard" class="btn btn-primary">Vender Cartão da Loja</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-easein="flipYIn" id="dsModal" tabindex="-1" role="dialog" aria-labelledby="dsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="opacity: 1; display: block;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title" id="dsModalLabel">Desconto Descrição</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control input-sm kb-pad" id="get_ds" onclick="this.select();" value="">

                    <label class="checkbox" for="apply_to_order">
                        <div class="iradio_square-green checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                            <input type="radio" name="apply_to" value="order"
                                   id="apply_to_order" checked="checked"
                                   style="position: absolute; top: -20%; left: -20%;
                                   display: block; width: 140%; height: 140%;
                                   margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                            <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%;
                            display: block; width: 140%; height: 140%;
                            margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                            </ins>
                        </div>
                        Aplicar à Venda
                    </label>
                    <label class="checkbox" for="apply_to_products">
                        <div class="iradio_square-green" aria-checked="false" aria-disabled="false"
                             style="position: relative;">
                            <input type="radio" name="apply_to" value="products" id="apply_to_products"
                                   style="position: absolute; top: -20%; left: -20%; display: block; width: 140%;
                                   height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255);
                                   border: 0px; opacity: 0;">
                            <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%;
                            display: block; width: 140%; height: 140%; margin: 0px; padding: 0px;
                            background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                            </ins>
                        </div>
                        Aplicar ao Produto
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Fechar</button>
                    <button type="button" id="updateDiscount" class="btn btn-primary btn-sm">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-easein="flipYIn" id="tsModal" tabindex="-1" role="dialog" aria-labelledby="tsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="opacity: 1; display: block;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title" id="tsModalLabel">Taxa Descrição</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control input-sm kb-pad" id="get_ts" onclick="this.select();" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Fechar</button>
                    <button type="button" id="updateTax" class="btn btn-primary btn-sm">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-easein="flipYIn" id="proModal" tabindex="-1" role="dialog" aria-labelledby="proModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="opacity: 1; display: block;">
            <div class="modal-content">
                <div class="modal-header modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title" id="proModalLabel">
                        Pagamento				</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tbody><tr>
                            <th style="width:25%;">Preço de Internet</th>
                            <th style="width:25%;"><span id="net_price"></span></th>
                            <th style="width:25%;">Produto Taxa</th>
                            <th style="width:25%;"><span id="pro_tax"></span> <span id="pro_tax_method"></span></th>
                        </tr>
                        </tbody></table>
                    <input type="hidden" id="row_id">
                    <input type="hidden" id="item_id">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nPrice">Valor unitário</label>							<input type="text" class="form-control input-sm kb-pad" id="nPrice" onclick="this.select();" placeholder="Novo Preço">
                            </div>
                            <div class="form-group">
                                <label for="nDiscount">Desconto</label>							<input type="text" class="form-control input-sm kb-pad" id="nDiscount" onclick="this.select();" placeholder="Desconto">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nQuantity">Qtd</label>							<input type="text" class="form-control input-sm kb-pad" id="nQuantity" onclick="this.select();" placeholder="Quantidade Atual">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-success" id="editItem">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-easein="flipYIn" id="susModal" tabindex="-1" role="dialog" aria-labelledby="susModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="opacity: 1; display: block;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title" id="susModalLabel">Suspender Venda</h4>
                </div>
                <div class="modal-body">
                    <p>Tipo de referência Nota</p>

                    <div class="form-group">
                        <label for="reference_note">Nota de referência</label>					<input type="text" name="reference_note" value="" class="form-control kb-text" id="reference_note">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Fechar </button>
                    <button type="button" id="suspend_sale" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal" data-easein="flipYIn" id="saleModal" tabindex="-1" role="dialog" aria-labelledby="saleModalLabel" aria-hidden="true"></div>
    <div class="modal" data-easein="flipYIn" id="opModal" tabindex="-1" role="dialog" aria-labelledby="opModalLabel" aria-hidden="true"></div>

    <div class="modal" data-easein="flipYIn" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-success" style="opacity: 1; display: block;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title" id="payModalLabel">
                        Pagamento				</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-9">
                            <div class="font16">
                                <table class="table table-bordered table-condensed" style="margin-bottom: 0;">
                                    <tbody>
                                    <tr>
                                        <td width="25%" style="border-right-color: #FFF !important;">Total de Itens</td>
                                        <td width="25%" class="text-right"><span id="item_count">1 (1)</span></td>
                                        <td width="25%" style="border-right-color: #FFF !important;">Total a Pagar</td>
                                        <td width="25%" class="text-right"><span id="twt">8.00</span></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right-color: #FFF !important;">Total Pago</td>
                                        <td class="text-right"><span id="total_paying">0.00</span></td>
                                        <td style="border-right-color: #FFF !important;">Troco</td>
                                        <td class="text-right"><span id="balance">-8.00</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="note">Informações</label>
                                        <textarea name="note" id="note" class="pa form-control kb-text" style="margin: 0px -525px 0px 0px;
                                        width: 944px; height: 334px;">

                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="amount">Valor Pago</label>
                                        <input name="amount[]" type="text" id="amount" class="pa form-control kb-pad amount">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="paid_by">Pagar em</label>
                                        <select id="paid_by" class="form-control paid_by select2 select2-hidden-accessible"
                                                style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <option value="cash">Dinheiro</option>
                                            <option value="CC">Cartão de Crédito</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="gift_card">Cartão da Loja</option>
                                            <option value="stripe">Cartão de Débito</option>
                                        </select><span class="select2 select2-container select2-container--default select2-container--below"
                                                       dir="ltr" style="width: 100%;">
                                            <span class="selection">
                                                <span class="select2-selection select2-selection--single" role="combobox"
                                                      aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"
                                                      tabindex="0" aria-labelledby="select2-paid_by-container">
                                                    <span class="select2-selection__rendered" id="select2-paid_by-container"
                                                          title="Dinheiro">
                                                        Dinheiro
                                                    </span>
                                                    <span class="select2-selection__arrow" role="presentation">
                                                        <b role="presentation"></b>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="dropdown-wrapper" aria-hidden="true">

                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group gc" style="display: none;">
                                        <label for="gift_card_no">Cartão Loja No</label>
                                        <input type="text" id="gift_card_no" class="pa form-control kb-pad gift_card_no gift_card_input">

                                        <div id="gc_details"></div>
                                    </div>
                                    <div class="pcc" style="display: none;">
                                        <div class="form-group">
                                            <input type="text" id="swipe" class="form-control swipe swipe_input" placeholder="Cartão de furto aqui, em seguida, escrever código de segurança manualmente">
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <input type="text" id="pcc_no" class="form-control kb-pad" placeholder="Cartão de Crédito No">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">

                                                    <input type="text" id="pcc_holder" class="form-control kb-text" placeholder="Titular em Espera">
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-group">
                                                    <select id="pcc_type" class="form-control pcc_type select2 select2-hidden-accessible" placeholder="Tipo de Cartão" tabindex="-1" aria-hidden="true">
                                                        <option value="Visa">Visa</option>
                                                        <option value="MasterCard">MasterCard</option>
                                                        <option value="Amex">Amex</option>
                                                        <option value="Discover">Discover</option>
                                                    </select>
                                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100px;">
                                                        <span class="selection">
                                                            <span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list"
                                                                  aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-pcc_type-container">
                                                                <span class="select2-selection__rendered" id="select2-pcc_type-container" title="Visa">
                                                                    Visa
                                                                </span>
                                                                <span class="select2-selection__arrow" role="presentation">
                                                                    <b role="presentation"></b>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true">

                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-group">
                                                    <input type="text" id="pcc_month" class="form-control kb-pad" placeholder="Mês">
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-group">

                                                    <input type="text" id="pcc_year" class="form-control kb-pad" placeholder="Ano">
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-group">

                                                    <input type="text" id="pcc_cvv2" class="form-control kb-pad" placeholder="CVV2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pcheque" style="display: none;">
                                        <div class="form-group"><label for="cheque_no">Cheque No</label>
                                            <input type="text" id="cheque_no" class="form-control cheque_no  kb-text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 text-center">
                            <!-- <span style="font-size: 1.2em; font-weight: bold;">Venda Rápida</span> -->

                            <div class="btn-group btn-group-vertical" style="width:100%;">
                                <button type="button" class="btn btn-info btn-block quick-cash" id="quick-payable">8</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">10</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">20</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">50</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">100</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">500</button>
                                <button type="button" class="btn btn-block btn-danger" id="clear-cash-notes">
                                    Limpar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Fechar </button>
                    <button class="btn btn-primary" id="submit-sale">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-easein="flipYIn" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="cModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="opacity: 1; display: block;">
            <div class="modal-content">
                <div class="modal-header modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
                    <h4 class="modal-title" id="cModalLabel">
                        Adicionar Cliente				</h4>
                </div>
                <form action="http://www.scriptphp.ga/pdv/pos/add_customer" id="customer-form" method="post" accept-charset="utf-8">
                    <input type="hidden" name="spos_token" value="fea3290b1d7fd34620aa09245b8ec925" style="display:none;">
                    <div class="modal-body">
                        <div id="c-alert" class="alert alert-danger" style="display:none;"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="code">
                                        Nome							</label>
                                    <input type="text" name="name" value="" class="form-control input-sm kb-text" id="cname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="cemail">
                                        Endereço de e-mail							</label>
                                    <input type="text" name="email" value="" class="form-control input-sm kb-text" id="cemail">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="phone">
                                        Telefone							</label>
                                    <input type="text" name="phone" value="" class="form-control input-sm kb-pad" id="cphone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="cf1">
                                        CPF							</label>
                                    <input type="text" name="cf1" value="" class="form-control input-sm kb-text" id="cf1">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="cf2">
                                        RG							</label>
                                    <input type="text" name="cf2" value="" class="form-control input-sm kb-text" id="cf2">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" style="margin-top:0;">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Fechar </button>
                        <button type="submit" class="btn btn-primary" id="add_customer"> Adicionar Cliente </button>
                    </div>
                </form>		</div>
        </div>
    </div>


    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/redactor/redactor.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/select2/select2.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/formvalidation/js/formValidation.popular.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/formvalidation/js/framework/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/dist/js/common-libs.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/dist/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/dist/js/app.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/dist/js/pages/all.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/dist/js/custom.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/velocity/velocity.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/plugins/velocity/velocity.ui.min.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/dist/js/parse-track-data.js" type="text/javascript"></script>
    <script src="http://www.scriptphp.ga/pdv/themes/default/assets/dist/js/pos.js" type="text/javascript"></script>
    <script type="text/javascript">
        var base_url = 'http://www.scriptphp.ga/pdv/', assets = 'http://www.scriptphp.ga/pdv/themes/default/assets/';
        var dateformat = 'd/m/y', timeformat = 'h:i:s A';
        var Settings = {
            "logo":"logo11.png","site_name":"Site de Vendas - PDV","tel":"11 4004-0001",
            "dateformat":"d\/m\/y","timeformat":"h:i:s A","language":"portugues",
            "theme":"default","mmode":"0","captcha":"0","currency_prefix":"R$ ",
            "default_customer":"1","default_tax_rate":"0%","rows_per_page":"25",
            "total_rows":"30","header":"" +
            "<h2>Sistema de Vendas - PDV" +
            "<\/h2>Av. Paulista, 300" +
            "<br>S\u00e3o Paulo - SP","footer":"Volte Sempre!\r\n<br>",
            "bsty":"3","display_kb":"0","default_category":"4","default_discount":"0","item_addition":"1",
            "barcode_symbology":"","pro_limit":"100","decimals":"2","thousands_sep":",",
            "decimals_sep":".","focus_add_item":"F7","add_customer":"ALT+F2",
            "toggle_category_slider":"ALT+F10","cancel_sale":"F3","suspend_sale":"F2",
            "print_order":"F6","print_bill":"F4","finalize_sale":"F1","today_sale":"Ctrl+F1",
            "open_hold_bills":"F5","close_register":"ALT+F7","java_applet":"0","receipt_printer":"",
            "pos_printers":"","cash_drawer_codes":"","char_per_line":"42","rounding":"0",
            "pin_code":"81dc9bdb52d04dc20036dbd8313ed055","purchase_code":"ff2400d9-f3aa-4db5-9dc5-4eee236c6254",
            "envato_username":"patriciomelo"
        };
        var sid = false, username = 'admin', spositems = {};
        $(window).load(function () {
            $('#mm_pos').addClass('active');
            $('#pos_index').addClass('active');
        });
        var pro_limit = 100, java_applet = 0, count = 1, total = 0, an = 1, p_page = 0, page = 0, cat_id = 4, tcp = 3;
        var gtotal = 0, order_discount = 0, order_tax = 0, protect_delete = 0;
        var order_data = '', bill_data = '';
        var lang = new Array();
        lang['code_error'] = 'Código de Erro';
        lang['r_u_sure'] = '<strong>Tem certeza que deseja cancelar?</strong>';
        lang['please_add_product'] = 'Favor adicionar produto';
        lang['paid_less_than_amount'] = 'Valor pago é menor do que pagar';
        lang['x_suspend'] = 'Venda não pode ser suspensa';
        lang['discount_title'] = 'Desconto Descrição';
        lang['update'] = 'Atualizar';
        lang['tax_title'] = 'Taxa Descrição';
        lang['leave_alert'] = 'Você vai a perda de dados, você tem certeza?';
        lang['close'] = 'Fechar';
        lang['delete'] = 'Deletar';
        lang['no_match_found'] = 'Nenhum produto correspondente encontrado';
        lang['wrong_pin'] = 'Pin errado';
        lang['file_required_fields'] = 'Por favor, preencha os campos obrigatórios';
        lang['enter_pin_code'] = 'Digite o código Pin';
        lang['incorrect_gift_card'] = 'Número do cartão Loja é errado ou cartão já é usado.';
        lang['card_no'] = 'Cartão No';
        lang['value'] = 'Valor';
        lang['balance'] = 'Troco';
        lang['unexpected_value'] = 'Valor inesperado fornecido!';
        lang['inclusive'] = 'Incluso';
        lang['exclusive'] = 'Não incluso';
        lang['total'] = 'Total';
        lang['total_items'] = 'Total de Itens';
        lang['order_tax'] = 'Taxa';
        lang['order_discount'] = 'Desconto';
        lang['total_payable'] = 'Total a Pagar';
        lang['rounding'] = 'Arredondamento';
        lang['grand_total'] = 'Total Geral';

        $(document).ready(function() {
            posScreen();

            if(get('rmspos')) {
                if (get('spositems')) { remove('spositems'); }
                if (get('spos_discount')) { remove('spos_discount'); }
                if (get('spos_tax')) { remove('spos_tax'); }
                if (get('spos_note')) { remove('spos_note'); }
                if (get('spos_customer')) { remove('spos_customer'); }
                if (get('amount')) { remove('amount'); }
                remove('rmspos');
            }
            if(! get('spos_discount')) {
                store('spos_discount', '0');
                $('#discount_val').val('0');
            }
            if(! get('spos_tax')) {
                store('spos_tax', '0%');
                $('#tax_val').val('0%');
            }

            if (ots = get('spos_tax')) {
                $('#tax_val').val(ots);
            }
            if (ods = get('spos_discount')) {
                $('#discount_val').val(ods);
            }
            if(Settings.display_kb == 1) { display_keyboards(); }
            nav_pointer();
            loadItems();
            read_card();
            bootbox.addLocale('bl',{OK:'OK',CANCEL:'No',CONFIRM:'Sim'});
            bootbox.setDefaults({closeButton:false,locale:"bl"});
        });
    </script>


    <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0"
        style="display: none;"></ul><span role="status" aria-live="assertive" aria-relevant="additions"
                                          class="ui-helper-hidden-accessible">

    </span>
    </body>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; display: block;">
        <div class="ps-scrollbar-x" style="left: 0px; width: 0px;">

        </div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; display: block; height: 469px;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 286px;">

        </div>
    </div>
</html>


@endsection