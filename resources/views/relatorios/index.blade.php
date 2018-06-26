@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
    <div class="container">

        <h3 align="center"><i class="fas fa-list-alt"></i> Relatórios</h3>

        {!! Form::open(['route' => 'relatorios.produtomais', 'target'=>'_blank']) !!}
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>PRODUTOS MAIS VENDIDOS ENTRE DATAS</th>
                    </tr>
                </thead>

                <tbody>
                    <div align="center">
                        <tr>
                            <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
                            <link rel="stylesheet" href="/resources/demos/style.css">
                            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

                            <td style="width: 45%">Data Inicial:
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::dateTime('dtinn', $dtin = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y'), ['class'=>'form-control pull-right simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'dtin', 'name'=>'dtin']) !!}
                                    {{--<input type="text" id="dtin" name="dtin" class="form-control pull-right simple-field-data-mask" data-mask="00/00/0000" placeholder="00/00/0000">--}}
                                </div>
                            </td>

                            <td style="width: 45%">Data Final:
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::dateTime('dtfll', $dtfl = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y'), ['class'=>'form-control pull-right simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'dtfl', 'name'=>'dtfl']) !!}
                                    {{--<input type="text" id="dtfl" name="dtfl" class="form-control pull-right simple-field-data-mask" data-mask="00/00/0000" placeholder="00/00/0000">--}}
                                </div>
                            </td>

                            <script src="{{asset('js/jquery.js')}}"></script>
                            <script src="{{asset('js/jquery.min.js')}}"></script>
                            <script src="{{asset('js/jquery-ui.js')}}"></script>

                            <script type="text/javascript">
                                $("#dtin,#dtfl").datepicker({
                                    dateFormat: 'dd/mm/yy',
                                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                                    nextText: 'Próximo',
                                    prevText: 'Anterior',
                                    changeMonth: true,
                                    changeYear: true
                                });
                            </script>

                            <input type="hidden" name="dti" value="dtin">
                            <input type="hidden" name="dtf" value="dtfl">

                            <td style="width: 10%">
                                <br>
                                <button class="btn btn-success btn-block btn-flat">Enviar</button>
                            </td>
                        </tr>

                    </div>


                </tbody>
            </table>
        {!! Form::close() !!}

        {!! Form::open(['route' => 'relatorios.climais', 'target'=>'_blank']) !!}
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>CLIENTES QUE MAIS COMPRARAM ENTRE DATAS</th>
            </tr>
            </thead>

            <tbody>
            <div align="center">
                <tr>
                    <td style="width: 45%">Data Inicial:
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::dateTime('dtinn3', $dtin3 = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y'), ['class'=>'form-control pull-right simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'dtin3', 'name'=>'dtin3']) !!}
                            {{--<input type="text" id="dtin" name="dtin" class="form-control pull-right simple-field-data-mask" data-mask="00/00/0000" placeholder="00/00/0000">--}}
                        </div>
                    </td>

                    <td style="width: 45%">Data Final:
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::dateTime('dtfll3', $dtfl3 = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y'), ['class'=>'form-control pull-right simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'dtfl3', 'name'=>'dtfl3']) !!}
                            {{--<input type="text" id="dtfl" name="dtfl" class="form-control pull-right simple-field-data-mask" data-mask="00/00/0000" placeholder="00/00/0000">--}}
                        </div>
                    </td>

                    <script type="text/javascript">
                        $("#dtin3,#dtfl3").datepicker({
                            dateFormat: 'dd/mm/yy',
                            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                            nextText: 'Próximo',
                            prevText: 'Anterior',
                            changeMonth: true,
                            changeYear: true
                        });
                    </script>

                    <input type="hidden" name="dti3" value="dtin3">
                    <input type="hidden" name="dtf3" value="dtfl3">

                    <td style="width: 10%">
                        <br>
                        <button class="btn btn-success btn-block btn-flat">Enviar</button>
                    </td>
                </tr>
            </div>
            </tbody>
        </table>
        {!! Form::close() !!}

        {!! Form::open(['route' => 'relatorios.tot_entradas', 'target'=>'_blank']) !!}
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>VALOR TOTAL DE ENTRADAS E SAÍDAS NO CAIXA ENTRE DATAS</th>
                </tr>
            </thead>

            <tbody>
                <div align="center">
                    <tr>
                        <td style="width: 45%">Data Inicial:
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::dateTime('dtinn2', $dtin2 = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y'), ['class'=>'form-control pull-right simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'dtin2', 'name'=>'dtin2']) !!}
                                {{--<input type="text" id="dtin" name="dtin" class="form-control pull-right simple-field-data-mask" data-mask="00/00/0000" placeholder="00/00/0000">--}}
                            </div>
                        </td>

                        <td style="width: 45%">Data Final:
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::dateTime('dtfll2', $dtfl2 = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y'), ['class'=>'form-control pull-right simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'dtfl2', 'name'=>'dtfl2']) !!}
                                {{--<input type="text" id="dtfl" name="dtfl" class="form-control pull-right simple-field-data-mask" data-mask="00/00/0000" placeholder="00/00/0000">--}}
                            </div>
                        </td>

                        <script type="text/javascript">
                            $("#dtin2,#dtfl2").datepicker({
                                dateFormat: 'dd/mm/yy',
                                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                                nextText: 'Próximo',
                                prevText: 'Anterior',
                                changeMonth: true,
                                changeYear: true
                            });
                        </script>

                        <input type="hidden" name="dti2" value="dtin2">
                        <input type="hidden" name="dtf2" value="dtfl2">

                        <td style="width: 10%">
                            <br>
                            <button class="btn btn-success btn-block btn-flat">Enviar</button>
                        </td>
                    </tr>
                </div>
            </tbody>
        </table>
        {!! Form::close() !!}
    </div>
@endsection

