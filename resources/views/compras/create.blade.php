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
        <h1>Nova Categoria</h1>

        {!! Form::open(['route' => 'compras.store']) !!}
        <div class="form-group has-feedback {{ $errors->has('dataEntrada') ? 'has-error' : '' }}">
            {!! Form::label('dataEntrada', 'DATA ENTRADA:') !!}
            {!! Form::dateTime('dataEntrada', $dataEntrada = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control']) !!}
            @if ($errors->has('dataEntrada'))
                <span class="help-block">
                    <strong>{{ $errors->first('dataEntrada') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('quantidade') ? 'has-error' : '' }}">
            {!! Form::label('quantidade', 'QUANTIDADE:') !!}
            {!! Form::text('quantidade', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'#', 'placeholder'=>'00', 'data-mask-maxlength'=>'false']) !!}
            @if ($errors->has('quantidade'))
                <span class="help-block">
                    <strong>{{ $errors->first('quantidade') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('precoCusto') ? 'has-error' : '' }}">
            {!! Form::label('precoCusto', 'PREÇO DE CUSTO:') !!}
            {!! Form::text('precoCusto', 'null', ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
            @if ($errors->has('precoCusto'))
                <span class="help-block">
                    <strong>{{ $errors->first('precoCusto') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('fornecedor_id', 'FORNECEDOR:') !!}

            <br/>

            <select id="fornecedorid" class="form-control m-bot15" name="fornecedor_id">
            <option class="form-control">SELECIONE UM FORNECEDOR</option>
                @foreach($data as $for)
                    <option class="form-control" value="{{ $for->id }}">
                        {{ $for->nome }}
                    </option>
                @endforeach
            </select>

            <!-- {{ Form::select('fornecedor_id',
               \App\Fornecedor::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
               ['class'=>'form-control']) }} -->
        </div>
        <div class="form-group">
            {!! Form::label('produto_id', 'PRODUTO:') !!}

            <br/>

            <select id="produtoid" class="form-control m-bot15" name="produto_id">
            <option class="form-control">SELECIONE UM PRODUTO</option>
                @foreach($data1 as $pro)
                    <option class="form-control" value="{{ $pro->id }}">
                        {{ $pro->nome }}
                    </option>
                @endforeach
            </select>

            <!-- {{ Form::select('produto_id',
               \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
               ['class'=>'form-control']) }} -->
        </div>

        <div>
            {!! Form::submit('Registrar Compra', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
 @endsection

 @section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#fornecedorid").select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#produtoid").select2();
        });
    </script>
@endsection