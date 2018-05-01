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
                    <div class="col-xs-9">
                        <div class="font16">
                            <table class="table table-bordered table-condensed" style="margin-bottom: 0;">
                                <tbody>
                                <tr style="background-color: white">
                                    <td width="25%" style="border-right-color: #FFF !important;">Total de itens</td>
                                    <td width="25%" class="text-right"><span id="item_count">0.00</span></td>
                                    <td width="25%" style="border-right-color: #FFF !important;">Total a pagar</td>
                                    <td width="25%" class="text-right"><span id="twt">0.00</span></td>
                                </tr>
                                <tr style="background-color: white">
                                    <td style="border-right-color: #FFF !important;">Total pago</td>
                                    <td class="text-right"><span id="total_paying">0.00</span></td>
                                    <td style="border-right-color: #FFF !important;">Troco</td>
                                    <td class="text-right"><span id="balance">0.00</span></td>
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
                                    <input name="amount[]" type="text" id="amount"
                                           class="pa form-control kb-pad amount"/>
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
                    <div class="col-xs-3 text-center">

                        <div class="btn-group btn-group-vertical" style="width:100%;">
                            <button type="button" class="btn btn-info btn-block quick-cash" id="quick-payable">0.00
                            </button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">10</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">20</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">50</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">100</button>
                                <button type="button" class="btn btn-block btn-warning quick-cash">500</button>
                            <button type="button" class="btn btn-block btn-danger"
                                    id="clear-cash-notes">Limpar</button>
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