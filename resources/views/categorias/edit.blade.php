@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>

    <div class="container">
        <h1>Editar Categoria</h1>

        {!! Form::open(['route' => ["categorias.update", $categoria->id], 'method'=>'put']) !!}
        <div class="form-group has-feedback {{ $errors->has('descricao') ? 'has-error' : '' }}">
                {!! Form::label('descricao', 'DESCRIÇÃO:') !!}
                {!! Form::text('descricao', $categoria->descricao, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                @if ($errors->has('descricao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                {!! Form::submit('Editar Categoria', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection