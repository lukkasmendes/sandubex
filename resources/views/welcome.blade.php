<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sandubex</title>

        <!-- Fonts -->
        <link href="/js/welc.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("../images/log2.png");
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-position: center center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/pedidos') }}">Acesso ao sistema</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                       {{-- <a href="{{ route('register') }}">Register</a>--}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a href="{{'/pedidos'}}" style="text-decoration: none; color: inherit">Sandubex</a>
                </div>

                <div class="links">
                    <a href="{{'/caixas'}}">Caixa</a>
                    <a href="{{'/produtos'}}">Produtos</a>
                    <a href="{{'/categorias'}}">Categorias</a>
                    <a href="{{'/clientes'}}">Clientes</a>
                </div>
            </div>
        </div>
    </body>
</html>
