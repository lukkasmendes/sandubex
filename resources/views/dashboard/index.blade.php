@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
    <div class="container">

        <h3 align="center"><i class="fas fa-tachometer-alt"></i> Dashboard</h3>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <canvas id="myChart" class="chartjs" width="60" height="20" style="display: block; width: 60px; height: 20px;"></canvas>

        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {

                    datasets: [{
                        data: [10, 20, 30, 40, 50],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1
                    }],

                    labels: [
                        'Vermelho',
                        'Amarelo',
                        'Azul',
                        'Verde',
                        'Laranja'
                    ]



                }
            });
        </script>


        <canvas id="myChart2" class="chartjs" width="60" height="20" style="display: block; width: 60px; height: 20px;"></canvas>

        <script>
            var ctx = document.getElementById("myChart2").getContext('2d');
            var myChart2 = new Chart(ctx, {
                type: 'pie',
                data: {

                    datasets: [{
                        data: [10, 20, 30, 40, 50],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1
                    }],

                    labels: [
                        'Vermelho',
                        'Amarelo',
                        'Azul',
                        'Verde',
                        'Laranja'
                    ]



                }
            });
        </script>


    </div>
@endsection