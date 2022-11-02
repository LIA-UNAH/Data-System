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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">L. {{ $ingresos }}</div>
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">L. {{ $egresos }}</div>
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">L. {{ $ingresos-$egresos }}</div>
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
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Proyectos</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Migración De Un Servidor  <span class="float-right">50%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" alt="...">
                        </div>
                        <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                            constantly updated collection of beautiful svg images that you can use
                            completely free and without attribution!</p>
                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                            unDraw →</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
