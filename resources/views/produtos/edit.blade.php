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

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif



        {!! Form::open(['route' => ["produtos.update", $produto->id], 'method'=>'put', 'files'=>'true']) !!}
            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $produto->nome, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoria:') !!}
                {{ Form::select('categoria_id',
                   \App\Categoria::orderBy('descricao')->pluck('descricao', 'id')->toArray(), $produto->categoria_id,
                   ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {!! Form::label('unidade', 'Unidade:') !!}
                {!! Form::text('unidade', $produto->unidade, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('precoVenda', 'Preço de Venda:') !!}
                {!! Form::text('precoVenda', $produto->precoVenda, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('precoCusto_est', 'Preço de Custo:') !!}
                {!! Form::text('precoCusto_est', $produto->precoCusto_est, ['class'=>'form-control', 'disabled' => 'disabled', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('estoqueMin', 'Estoque Mínimo:') !!}
                {!! Form::text('estoqueMin', $produto->estoqueMin, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('quantidade_est', 'Estoque Atual:') !!}
                {!! Form::text('quantidade_est', $produto->quantidade_est, ['class'=>'form-control', 'disabled' => 'disabled', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>





            <a
             href="#">
                Editar Preço de Custo / Estoque
            </a>






            <div class="form-group"><br/>
                {!! Form::label('validade', 'Validade:') !!}
                {!! Form::text('validade', $produto->validade, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', $produto->descricao, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('imagem', 'Imagem do Produto:') !!}
                {!! Form::file('imagem', ['class'=>'form-control']) !!}
            </div>
            <div>
                {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection