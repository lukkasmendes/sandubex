@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

    <div class="container">
        <h1>Editar Compra</h1>

        {!! Form::open(['route' => ["compras.update", $compras->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('dataEntrada', 'DATA ENTRADA:') !!}
                {!! Form::dateTime('dataEntrada', $compras->dataEntrada, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
            </div>
            <div class="form-group has-feedback {{ $errors->has('quantidade') ? 'has-error' : '' }}">
                {!! Form::label('quantidade', 'QUANTIDADE:') !!}
                {!! Form::text('quantidade', $compras->quantidade, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'#', 'placeholder'=>'00', 'data-mask-maxlength'=>'false']) !!}
                @if ($errors->has('quantidade'))
                    <span class="help-block">
                    <strong>{{ $errors->first('quantidade') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('precoCusto') ? 'has-error' : '' }}">
                {!! Form::label('precoCusto', 'PREÇO DE CUSTO:') !!}
                {!! Form::text('precoCusto', $compras->precoCusto, ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
                @if ($errors->has('precoCusto'))
                    <span class="help-block">
                    <strong>{{ $errors->first('precoCusto') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('fornecedor_id', 'FORNECEDOR:') !!}

                <select id="fornecedorid" class="form-control m-bot15" name="fornecedor_id">
                <option value="{{$compras->fornecedor->id}}" class="form-control">{{$compras->fornecedor->nome}}</option>
                    @foreach($data as $for)
                        <option class="form-control" value="{{ $for->id }}">
                            {{ $for->nome }}
                        </option>
                    @endforeach
                </select>

                <!-- {{ Form::select('fornecedor_id',
                   \App\Fornecedor::orderBy('nome')->pluck('nome', 'id')->toArray(), $compras->fornecedor_id,
                   ['class'=>'form-control']) }} -->
            </div>
            <div class="form-group">
                {!! Form::label('produto_id', 'PRODUTO:') !!}

                <select id="produtoid" class="form-control m-bot15" name="produto_id">
                <option value="{{$compras->produto->id}}" class="form-control">{{$compras->produto->nome}}</option>
                    @foreach($data1 as $pro)
                        <option class="form-control" value="{{ $pro->id }}">
                            {{ $pro->nome }}
                        </option>
                    @endforeach
                </select>

                <!-- {{ Form::select('produto_id',
                   \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(), $compras->produto_id,
                   ['class'=>'form-control']) }} -->
            </div>
            <div>
                {!! Form::submit('Editar Registro de Compra', ['class'=>'btn btn-primary']) !!}
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