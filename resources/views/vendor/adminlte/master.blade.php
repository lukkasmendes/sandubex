<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))

    </title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">







<!-- Select2
    https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css
    https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js
-->
    <link href="{{asset('css/select2.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2.js')}}"></script>
<!-- Select2 -->






    @if(config('adminlte.plugins.select2'))
        <!-- Select2
            //cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2
        -->
        <link rel="stylesheet" href="{{asset('css/select2-2.css')}}">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables
            //cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css
        -->
        <link rel="stylesheet" href="{{asset('css/datatable2.css')}}">
    @endif

    @yield('adminlte_css')

    <!--

    https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js
    https://oss.maxcdn.com/respond/1.4.2/respond.min.js

    [if lt IE 9]>
    <script src="{{asset('js/html5.js')}}"></script>
    <script src="{{asset('js/respond.js')}}"></script>
    <![endif]-->

    <!-- Google Font
        https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic
    -->
    <link rel="stylesheet" href="{{asset('css/googlefont.css')}}">





</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2
        //cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js
    -->
    <script src="{{asset('js/select2-2.js')}}"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables
        //cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js
    -->
    <script src="js/datatables.js"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS
        //cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js
    -->
    <script src="{{asset('js/chart.js')}}"></script>
@endif

@yield('adminlte_js')








<!-- TAVA DANDO PAL NA DATATABLE -->

            <!-- Scripts
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            -->










<!-- SELECT2
    https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js
-->
<script src="{{asset('js/select2-6.js')}}"></script>

@yield('scripts')

<!-- <script language="JavaScript" src="shortcut.js"></script> -->












</body>
</html>
