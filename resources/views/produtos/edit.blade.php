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
                {!! Form::label('nome', 'NOME:') !!}
                {!! Form::text('nome', $produto->nome, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('categoria_id', 'CATEGORIA:') !!}
                <select id="categoriaid" class="form-control m-bot15" name="categoria_id">
                    <option value="{{$produto->categoria->id}}">{{$produto->categoria->descricao}}</option>
                        @foreach($data as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->descricao }}
                            </option>
                        @endforeach
                </select>
                <!-- {{ Form::select('categoria_id',
                   \App\Categoria::orderBy('descricao')->pluck('descricao', 'id')->toArray(), $produto->categoria_id,
                   ['class'=>'form-control']) }} -->
            </div>

            <div class="form-group">
                {!! Form::label('unidade', 'UNIDADE:') !!}
                {!! Form::text('unidade', $produto->unidade, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('precoVenda', 'PREÇO DE VENDA:') !!}
                {!! Form::text('precoVenda', $produto->precoVenda, ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
            </div>

            <!-- <div class="form-group">
                {!! Form::label('precoCusto_est', 'Preço de Custo:') !!}
                {!! Form::text('precoCusto_est', $produto->precoCusto_est, ['class'=>'form-control', 'disabled' => 'disabled', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div> -->
<!-- 
            @if($produto->estoque == null)
                <div class="form-group">
                    {!! Form::label('precoCusto_est', 'Preço de Custo:') !!}
                    {!! Form::text('precoCusto_est', null, ['class'=>'form-control', 'disabled' => 'disabled', 'title'=>'ESTE PREÇO É DEFINIDO NA COMPRA DESTE PRODUTO']) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::label('precoCusto_est', 'Preço de Custo:') !!}
                    {!! Form::text('precoCusto_est', $produto->estoque->precoCusto, ['class'=>'form-control', 'disabled' => 'disabled', 'title'=>'ESTE PREÇO É DEFINIDO NA COMPRA DESTE PRODUTO']) !!}
                </div>
            @endif -->

            <div class="form-group">
                {!! Form::label('estoqueMin', 'ESTOQUE MÍNIMO:') !!}
                {!! Form::text('estoqueMin', $produto->estoqueMin, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'#', 'placeholder'=>'00', 'data-mask-maxlength'=>'false']) !!}
            </div>

            <!-- <div class="form-group">
                {!! Form::label('quantidade_est', 'Estoque Atual:') !!}
                {!! Form::text('quantidade_est', $produto->quantidade_est, ['class'=>'form-control', 'disabled' => 'disabled', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div> -->
<!-- 
            @if($produto->estoque == null)
                <div class="form-group">
                    {!! Form::label('quantidade_est', 'Estoque Atual:') !!}
                    {!! Form::text('quantidade_est', null, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::label('quantidade_est', 'Estoque Atual:') !!}
                    {!! Form::text('quantidade_est', $produto->estoque->quantidade, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
                </div>
            @endif -->

            <a
             href="#">
                Editar Preço de Custo / Estoque
            </a>

            <div class="form-group"><br/>
                {!! Form::label('validade', 'VALIDADE:') !!}
                {!! Form::text('validade', $produto->validade, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'00/00/0000', 'placeholder'=>'00/00/0000']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('descricao', 'DESCRIÇÃO:') !!}
                {!! Form::text('descricao', $produto->descricao, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('imagem', 'IMAGEM DO PRODUTO:') !!}
                {!! Form::file('imagem', ['class'=>'form-control']) !!}
            </div>

            <div>
                {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#categoriaid").select2();
        });
    </script>
@endsection