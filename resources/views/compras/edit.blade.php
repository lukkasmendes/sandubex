@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

@section('content')
    <div class="container">
        <h1>Editar Categoria</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ["compras.update", $compras->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('dataEntrada', 'DATA ENTRADA:') !!}
                {!! Form::dateTime('dataEntrada', $compras->dataEntrada, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('quantidade', 'QUANTIDADE:') !!}
                {!! Form::text('quantidade', $compras->quantidade, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('precoCusto', 'PREÇO DE CUSTO:') !!}
                {!! Form::text('precoCusto', $compras->precoCusto, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fornecedor_id', 'FORNECEDOR:') !!}
                {{ Form::select('fornecedor_id',
                   \App\Fornecedor::orderBy('nome')->pluck('nome', 'id')->toArray(), $compras->fornecedor_id,
                   ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {!! Form::label('produto_id', 'PRODUTO:') !!}
                {{ Form::select('produto_id',
                   \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(), $compras->produto_id,
                   ['class'=>'form-control']) }}
            </div>
            <div>
                {!! Form::submit('Editar Registro de Compra', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection