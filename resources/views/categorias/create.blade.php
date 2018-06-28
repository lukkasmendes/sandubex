@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
    <script type="text/javascript">
        function maiuscula(obj) {
            obj.value = obj.value.toUpperCase();
        }
    </script>
    <div class="container" enctype="multipart/form-data">
        <h1>Nova Categoria</h1>

        {!! Form::open(['route' => 'categorias.store']) !!}
            <div class="form-group has-feedback {{ $errors->has('descricao') ? 'has-error' : '' }}">
                {!! Form::label('descricao', 'DESCRIÇÃO:') !!}
                {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe a descrição da categoria: bebidas, pães, carnes...', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                @if ($errors->has('descricao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                @endif
            </div>

            <div>
                {!! Form::submit('Criar Categoria', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
