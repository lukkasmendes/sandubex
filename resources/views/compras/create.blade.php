<!-- 
<div class="modal fade" id="novaCompra" tabindex="-1" role="dialog" aria-labelledby="novaCompraModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="novaCompraModal">Nova Compra</h4>
            </div>
            <div class="modal-body">
                <p> -->

@extends('adminlte::page')
@include('categorias.create')
@section('title', 'Sandubex')
@section('content_header')
    <script type="text/javascript">
        function maiuscula(obj) {
            obj.value = obj.value.toUpperCase();
        }
    </script>

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
        {!! Form::text('quantidade', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'#', 'placeholder'=>'00', 'data-mask-maxlength'=>'false']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('precoCusto', 'PREÇO DE CUSTO:') !!}
        {!! Form::text('precoCusto', 'null', ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
    </div>
    <div>
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
<!--                 </p>
</div> -->
    <div>
        {!! Form::submit('Registrar Compra', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
        <!-- </div>
    </div>
</div>
 -->
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