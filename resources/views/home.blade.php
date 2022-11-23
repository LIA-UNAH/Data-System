@extends('layouts.layouts')
@section('title', 'Dashboard')
@section('content')
    <!-- Custom fonts for this template -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tablero</h1>
            <a href="/reparaciones" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-wrench fa-sm text-white-50"></i> Reparación</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Ingresos -->
            <div class="col-xl-3 col-md-5 mb-4">
                <div class="card border-left-info shadow h-100 py-2"  style="padding: 10px">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Ingresos (Anual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">L. {{ number_format($ingresos, 2, ".", ",") }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-circle-up fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Egresos -->
            <div class="col-xl-3 col-md-5 mb-4">
                <div class="card border-left-danger shadow h-100 py-2"  style="padding: 10px">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Egresos (Anual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">L. {{ number_format($egresos, 2, ".", ",") }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-circle-down fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ganancia -->
            <div class="col-xl-3 col-md-5 mb-4">
                <div class="card border-left-success shadow h-100 py-2"  style="padding: 10px">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Margen de Ganancia (Anual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">L. {{ number_format($ingresos - $egresos, 2, ".", ",") }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reparaciones Pendientes -->
            <div class="col-xl-3 col-md-5 mb-4">
                <div class="card border-left-warning shadow h-100 py-2"  style="padding: 10px">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Reparaciones (Diarias)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-coffee fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-xl-6 col-md-5 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3" style="background: #0d6efd">
                        <h6 class="m-0 font-weight-bold text-white">REPORTE POR MES</h6>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-5 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3" style="background: #0d6efd">
                        <h6 class="m-0 font-weight-bold text-white">MARGEN DE GANANCIAS POR AÑO</h6>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container2"></div>
                        </figure>
                    </div>
                </div>

            </div>

            <div class="col-xl-6 col-md-5 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3" style="background: #0d6efd">
                        <h6 class="m-0 font-weight-bold text-white">REPORTE GENERAL POR AÑO</h6>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container3"></div>
                        </figure>
                    </div>
                </div>

            </div>

            <div class="col-xl-6 col-md-5 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3" style="background: #0d6efd">
                        <h6 class="m-0 font-weight-bold text-white" style="text-transform: uppercase">VENTAS REALIZADAS EN EL MES DE ({{ Carbon\Carbon::now()->locale('es')->monthName }})</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="tblaBody">
                            <table class="table" id="dataTable">
                                <thead class="card-header py-3" style="background: #1a202c; color:white">
                                <tr>
                                    <th style="text-align: left">EMPLEADO</th>
                                    <th style="text-align: left">TOTALES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($vendedores as $vende)
                                    <tr>
                                        <td>{{ $vende->name }}</td>
                                        <td>L. {{ number_format($vende->total, 2, ".", ",") }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push("scripsss")
    <script>
        let compras = @json($valores_compre);
        let ventas = @json($valores_ventas);

        Highcharts.chart('container', {
            title: {
                text: '',
                align: 'left'
            },
            xAxis: {
                categories: ['Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre']
            },
            yAxis: {
                title: {
                    text: 'HNL'
                }
            },
            labels: {
            },
            series: [{
                type: 'column',
                name: 'Ingresos',
                data: [parseFloat(ventas[0].Total),parseFloat(ventas[1].Total),parseFloat(ventas[2].Total),
                    parseFloat(ventas[3].Total),parseFloat(ventas[4].Total),parseFloat(ventas[5].Total),
                    parseFloat(ventas[6].Total),parseFloat(ventas[7].Total),parseFloat(ventas[8].Total),
                    parseFloat(ventas[9].Total),parseFloat(ventas[10].Total),parseFloat(ventas[11].Total)],
                color: '#29B6CA',
            }, {
                type: 'column',
                name: 'Egresos',
                data: [parseFloat(compras[0].Total),parseFloat(compras[1].Total),parseFloat(compras[2].Total),
                    parseFloat(compras[3].Total),parseFloat(compras[4].Total),parseFloat(compras[5].Total),
                    parseFloat(compras[6].Total),parseFloat(compras[7].Total),parseFloat(compras[8].Total),
                    parseFloat(compras[9].Total),parseFloat(compras[10].Total),parseFloat(compras[11].Total)],
                color: '#E74A3B',
            }, {
                type: 'column',
                name: 'Margen de Ganancia',
                data: [ventas[0].Total - compras[0].Total,ventas[1].Total - compras[1].Total,
                    ventas[2].Total - compras[2].Total,ventas[3].Total - compras[3].Total,
                    ventas[4].Total - compras[4].Total,ventas[5].Total - compras[5].Total,
                    ventas[6].Total - compras[6].Total,ventas[7].Total - compras[7].Total,
                    ventas[8].Total - compras[8].Total,ventas[9].Total - compras[9].Total,
                    ventas[10].Total - compras[10].Total,ventas[11].Total - compras[11].Total],
                color: '#1CC88A',
            }]
        });

        Highcharts.chart('container2', {
            title: {
                text: '',
                align: 'left'
            },
            xAxis: {
                categories: ['Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre']
            },
            yAxis: {
                title: {
                    text: 'HNL'
                }
            },
            labels: {
            },
            series: [  {
                type: 'spline',
                name: 'Margen de Ganancia',
                data: [ventas[0].Total - compras[0].Total,ventas[1].Total - compras[1].Total,
                    ventas[2].Total - compras[2].Total,ventas[3].Total - compras[3].Total,
                    ventas[4].Total - compras[4].Total,ventas[5].Total - compras[5].Total,
                    ventas[6].Total - compras[6].Total,ventas[7].Total - compras[7].Total,
                    ventas[8].Total - compras[8].Total,ventas[9].Total - compras[9].Total,
                    ventas[10].Total - compras[10].Total,ventas[11].Total - compras[11].Total],
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }]
        });

        Highcharts.chart('container3', {
            title: {
                text: '',
                align: 'left'
            },
            labels: {
            },
            series: [ {
                type: 'pie',
                name: 'Liter',
                data: [{
                    name: 'Ingresos',
                    y: {{ $ingresos }},
                    color: '#29B6CA'
                }, {
                    name: 'Egresos',
                    y: {{ $egresos }},
                    color: '#E74A3B'
                }, {
                    name: 'Margen de Ganancia',
                    y: {{ $ingresos - $egresos }},
                    color: '#1CC88A'
                }],
                center: [210, 160],
                size: 160,
                showInLegend: false,
                dataLabels: {
                    enabled: true
                }
            }]
        });
    </script>
@endpush
