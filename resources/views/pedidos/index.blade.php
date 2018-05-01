@extends('adminlte::page')

@include('pedidos.create')

@include('pedidos.pagamento')

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
        <table class="table table-striped table-condensed table-hover list-table" id="products-table">
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

                </tbody>
                <tfoot>
                    <tr class="success">
                        <td colspan="2" style="font-weight:bold;">Total a Pagar</td>
                        <td class="text-right" colspan="3" style="font-weight:bold;"><span id="total-payable">8.00</span></td>
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

<div class="filtr-container" style="width: 70%; float: right;">
    @foreach($produtos as $pro)
            <div class="filtr-item"
                 data-category="{{$pro->id}}"
                 name="{{$pro->id}}"
                 id="field"
                 data-field-id="{{$pro->id}}"
                 data-sort="{{$pro->categoria->descricao}}"
                 onclick="AddTableRow({{$pro->id}})">

                <button type="button"
                        name="{{$pro->id}}"
                        id="{{$pro->id}}"
                        data-name="produtos"
                        class="btn btn-both btn-flat">


                        <img name="{{$pro->nome}}" src="produtos/{{$pro->id}}/image" style="width: 100px; height: 100px;"/>
                            <br/>
                        <span>{{$pro->nome}}</span>
                </button>

            </div>
    @endforeach
</div>








@endsection


@section('scripts')
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


    <!-- FUÇANDO NO PDV -->

@endsection