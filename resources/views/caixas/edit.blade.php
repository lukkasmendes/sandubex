@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>

    <div class="container">
        <h1>Editar Movimentação</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ["caixas.update", $caixa->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('data', 'Data:') !!}
                {!! Form::dateTime('data', $caixa->data, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tipo', 'Entrada/Saída de caixa:') !!}<br />
                {!! Form::select('tipo', array('E' => 'Entrada','S' => 'Saída'), $caixa->tipo, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('valor', 'Valor:') !!}
                {!! Form::text('valor', $caixa->valor, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('observacao', 'Observação:') !!}
                {!! Form::text('observacao', $caixa->observacao, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection