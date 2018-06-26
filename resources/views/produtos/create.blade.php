@extends('adminlte::page')
@include('categorias.createModal')
@section('title', 'Sandubex')
@section('content_header')
<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>
    <div class="container" enctype="multipart/form-data">
        <h1>Novo Produto</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'produtos.store', 'files'=>'true']) !!}
            <div class="form-group">
                {!! Form::label('nome', 'NOME:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Infome o nome do produto', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>

            <div class="form-group">

<!-- Select2 -->
                {!! Form::label('categoria_id', 'CATEGORIA:') !!}
                <a
                        class="btn btn-success"
                        data-toggle="modal"
                        title="Nova Categoria"
                        data-target="#novaCategoria">
                    <i class="fas fa-plus"></i>
                </a>

                <br/>

                <select id="categoriaid" class="form-control m-bot15" name="categoria_id">
                    <option>Selecione uma categoria</option>
                        @foreach($data as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->descricao }}
                            </option>
                        @endforeach
                </select>
<!-- Select2 -->

            </div>

            <div class="form-group">
                {!! Form::label('unidade', 'UNIDADE:') !!}
                {!! Form::text('unidade', null, ['class'=>'form-control', 'placeholder'=>'Unidade de medida: unidade, litros, kg...', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>

            <!-- <div class="form-group">
                {!! Form::label('estoque_id', 'Estoque:') !!}
                {{ Form::select('estoque_id',
                   \App\Estoque::orderBy('quantidade')->pluck('quantidade', 'id')->toArray(), null,
                   ['class'=>'form-control', 'disabled'=>'disabled']) }}
            </div> -->

            <div class="form-group">
                {!! Form::label('estoque_id', 'ESTOQUE:') !!}
                {{ Form::text('estoque_id', null, ['class'=>'form-control', 'disabled'=>'disabled', 'placeholder'=>'O ESTOQUE INICIARÁ APÓS UMA COMPRA REALIZADA DESTE PRODUTO!']) }}
            </div>

            <div class="form-group">
                {!! Form::label('precoVenda', 'PREÇO DE VENDA:') !!}
                {!! Form::text('precoVenda', null, ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('estoqueMin', 'ESTOQUE MÍNIMO:') !!}
                {!! Form::text('estoqueMin', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'#', 'placeholder'=>'00', 'data-mask-maxlength'=>'false']) !!}
            </div>

            <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

            <div class="form-group">
                {!! Form::label('validade', 'VALIDADE:') !!}
                {!! Form::text('validade', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'validade', 'name'=>'validade']) !!}
            </div>

            <script src="{{asset('js/jquery.js')}}"></script>
            <script src="{{asset('js/jquery.min.js')}}"></script>
            <script src="{{asset('js/jquery-ui.js')}}"></script>

            <script type="text/javascript">
                $("#validade").datepicker({
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

            <div class="form-group">
                {!! Form::label('descricao', 'DESCRIÇÃO:') !!}
                {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe uma breve descrição deste produto', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);', 'maxlength'=>'25']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('imagem', 'IMAGEM DO PRODUTO:') !!}
                {!! Form::file('imagem', null, ['class'=>'form-control']) !!}
            </div>

            <div>
                {!! Form::submit('Criar Produto', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#categoriaid").select2();
        });
    </script>
@endsection