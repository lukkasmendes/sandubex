@extends('layouts.app')

@section('content')

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
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Infome o nome do produto']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoria:') !!}
                {{ Form::select('categoria_id',
                   \App\Categoria::orderBy('descricao')->pluck('descricao', 'id')->toArray(), null,
                   ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {!! Form::label('unidade', 'Unidade:') !!}
                {!! Form::text('unidade', null, ['class'=>'form-control', 'placeholder'=>'Unidade de medida: unidade, litros, kg...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('precoCusto', 'Preço de Custo:') !!}
                {!! Form::text('precoCusto', null, ['class'=>'form-control', 'placeholder'=>'Quanto você pagou por este produto']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('precoVenda', 'Preço de Venda:') !!}
                {!! Form::text('precoVenda', null, ['class'=>'form-control', 'placeholder'=>'Quanto este produto vai custar para o cliente'], number_format(2)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('estoqueMin', 'Estoque Mínimo:') !!}
                {!! Form::text('estoqueMin', null, ['class'=>'form-control', 'placeholder'=>'Informe a quantidade mínima que este produto deve ter']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('estoque', 'Estoque Atual:') !!}
                {!! Form::text('estoque', null, ['class'=>'form-control', 'placeholder'=>'Informe a quantidade deste produto']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe uma breve descrição deste produto']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('imagem', 'Imagem do Produto:') !!}
                {!! Form::file('imagem', null, ['class'=>'form-control']) !!}
            </div>
            <div>
                {!! Form::submit('Criar Produto', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection