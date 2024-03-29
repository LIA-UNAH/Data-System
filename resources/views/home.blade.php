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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Margen de Ganancia</div>
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
                                    Reparaciones Pendientes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendiente[0]->pendientes }}</div>
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
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Reporte de Ingresos y Egresos</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">

                        <h6 class="m-0 font-weight-bold text-primary">Ventas Vendedores ({{ Carbon\Carbon::now()->locale('es')->monthName }})</h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="tblaBody">
                            <table class="table" id="dataTable">
                                <thead class="card-header py-3" style="background: #1a202c; color:white">
                                <tr>
                                    <th style="text-align: left">Vendedor</th>
                                    <th style="text-align: left">Ventas (HNL)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($vendedores as $vende)
                                    <tr>
                                        <td>{{ $vende->name }}</td>
                                        <td>{{ number_format($vende->total, 2, ".", ",") }}</td>
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



        const ctx = document.getElementById('myChart');

        const data = {
            labels: ['Enero',
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
                    'Diciembre'],
            datasets: [
                {
                    label: 'Ingresos',
                    data: [parseFloat(ventas[0].Total),parseFloat(ventas[1].Total),parseFloat(ventas[2].Total),
                    parseFloat(ventas[3].Total),parseFloat(ventas[4].Total),parseFloat(ventas[5].Total),
                    parseFloat(ventas[6].Total),parseFloat(ventas[7].Total),parseFloat(ventas[8].Total),
                    parseFloat(ventas[9].Total),parseFloat(ventas[10].Total),parseFloat(ventas[11].Total)],
                    borderColor: '#0DCAF0',
                    backgroundColor: '#0DCAF0',
                    borderWidth: 2,
                    borderRadius: 0,
                    borderSkipped: false,
                },
                {
                    label: 'Egresos',
                    data: [parseFloat(compras[0].Total),parseFloat(compras[1].Total),parseFloat(compras[2].Total),
                    parseFloat(compras[3].Total),parseFloat(compras[4].Total),parseFloat(compras[5].Total),
                    parseFloat(compras[6].Total),parseFloat(compras[7].Total),parseFloat(compras[8].Total),
                    parseFloat(compras[9].Total),parseFloat(compras[10].Total),parseFloat(compras[11].Total)],
                    borderColor: '#DC3545',
                    backgroundColor:'#DC3545',
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false,
                },
                {
                    label: 'MG',
                    data: [ventas[0].Total - compras[0].Total,ventas[1].Total - compras[1].Total,
                    ventas[2].Total - compras[2].Total,ventas[3].Total - compras[3].Total,
                    ventas[4].Total - compras[4].Total,ventas[5].Total - compras[5].Total,
                    ventas[6].Total - compras[6].Total,ventas[7].Total - compras[7].Total,
                    ventas[8].Total - compras[8].Total,ventas[9].Total - compras[9].Total,
                    ventas[10].Total - compras[10].Total,ventas[11].Total - compras[11].Total],
                    borderColor: '#198754',
                    backgroundColor:'#198754',
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false,
                },
            ]
        };
        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });






    </script>
@endpush
