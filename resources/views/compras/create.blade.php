@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

<script type="text/javascript">

    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }

</script>

@section('content')
    <div class="container">
        <h1>Nova Compra</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'compras.store']) !!}
            <div class="form-group">
                {!! Form::label('dataEntrada', 'DATA ENTRADA:') !!}
                {!! Form::dateTime('dataEntrada', $dataEntrada = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('quantidade', 'QUANTIDADE:') !!}
                {!! Form::text('quantidade', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('precoCusto', 'PREÇO DE CUSTO:') !!}
                {!! Form::text('precoCusto', '0.00', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fornecedor_id', 'Fornecedor:') !!}
                {{ Form::select('fornecedor_id',
                   \App\Fornecedor::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
                   ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {!! Form::label('produto_id', 'Produto:') !!}
                {{ Form::select('produto_id',
                   \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
                   ['class'=>'form-control']) }}
            </div>
            <div>
                {!! Form::submit('Registrar Compra', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection