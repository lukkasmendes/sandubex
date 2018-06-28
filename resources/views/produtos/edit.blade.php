@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>

    <div class="container">
        <h1>Editar Produtos</h1>

        {!! Form::open(['route' => ["produtos.update", $produto->id], 'method'=>'put', 'files'=>'true']) !!}
            <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
                {!! Form::label('nome', 'NOME:') !!}
                {!! Form::text('nome', $produto->nome, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                @if ($errors->has('nome'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                {!! Form::label('categoria_id', 'CATEGORIA:') !!}
                <select id="categoriaid" class="form-control m-bot15" name="categoria_id">
                    <option value="{{$produto->categoria->id}}">{{$produto->categoria->descricao}}</option>
                        @foreach($data as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->descricao }}
                            </option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('unidade', 'UNIDADE:') !!}
                {!! Form::text('unidade', $produto->unidade, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>

            <div class="form-group has-feedback {{ $errors->has('precoVenda') ? 'has-error' : '' }}">
                {!! Form::label('precoVenda', 'PREÇO DE VENDA:') !!}
                {!! Form::text('precoVenda', $produto->precoVenda, ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
                @if ($errors->has('precoVenda'))
                    <span class="help-block">
                        <strong>{{ $errors->first('precoVenda') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('estoqueMin') ? 'has-error' : '' }}">
                {!! Form::label('estoqueMin', 'ESTOQUE MÍNIMO:') !!}
                {!! Form::text('estoqueMin', $produto->estoqueMin, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'#', 'placeholder'=>'00', 'data-mask-maxlength'=>'false']) !!}
                @if ($errors->has('estoqueMin'))
                    <span class="help-block">
                        <strong>{{ $errors->first('estoqueMin') }}</strong>
                    </span>
                @endif
            </div>

            <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

            <div class="form-group"><br/>
                {!! Form::label('validade', 'VALIDADE:') !!}
                {!! Form::text('validade', $produto->validade, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000', 'id'=>'validade', 'name'=>'validade']) !!}
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
                {!! Form::text('descricao', $produto->descricao, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>

            <div class="form-group has-feedback {{ $errors->has('imagem') ? 'has-error' : '' }}">
                {!! Form::label('imagem', 'IMAGEM DO PRODUTO:') !!}
                {!! Form::file('imagem', ['class'=>'form-control']) !!}
                @if ($errors->has('imagem'))
                    <span class="help-block">
                            <strong>{{ $errors->first('imagem') }}</strong>
                        </span>
                @endif
            </div>

            <div>
                {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}
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