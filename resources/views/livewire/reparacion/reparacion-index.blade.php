<div>
    {{-- Para los mensajes afirmativos y sin errores --}}
    @if (session('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('exito') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Reparaciones</h2>
            </div>

            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar y recargar usuario -->
                    <form action="{{ route('reparaciones.searchIndex') }}" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                                value="" aria-label="" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn" type="submit" value="Buscar" style="background: white">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- HU8 - Buscar y recargar usuario -->
                </div>

                <div style="float: right">
                    <!-- Recargar -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/reparaciones"
                                style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                    style="color: white"></i></a>
                    </div>
                    <!-- Recargar -->

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success"
                                href="{{ route('reparaciones.create') }}"
                                style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                    style="color: white"></i></a>
                    </div>
                    <!-- Añadir -->
                </div>

            </div>
        </div>

        <div class="card-body" style="padding-left: 35px; padding-right: 35px">
            <div class="table-responsive" id="tblaBody">
                <table class="table table" id="dataTable">
                    <thead class="card-header py-3" style="background: #1a202c; color: white">
                        <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Teléfono</th>
                            <th>Dispositivo</th>
                            <th>Fecha de entrada</th>
                            <th>Fecha de salida</th>
                            <th>Precio</th>
                            <th style="text-align: center">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reparaciones as $valor=> $reparacion)
                            <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                                <td scope="row"><strong>{{ $valor + $reparaciones->firstItem() }}</strong></td>
                                <td scope="row"><strong>{{ $reparacion->cliente->name }}</strong></td>
                                <td scope="row">{{ $reparacion->telefono }}</td>
                                <td scope="row"> <strong>{{ $reparacion->marca }} {{ $reparacion->modelo }}</strong>
                                </td>
                                <td style="color: #b02a37">
                                    <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_entrada)->isoFormat('DD') }} de
                                        {{ \Carbon\Carbon::parse($reparacion->fecha_entrada)->isoFormat('MMMM') }}</strong>
                                </td>
                                @if ($reparacion->hora_salida >= '08:00' && $reparacion->hora_salida < '09:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 08:00 AM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '09:00' && $reparacion->hora_salida < '10:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 09:00 AM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '10:00' && $reparacion->hora_salida < '11:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 10:00 AM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '11:00' && $reparacion->hora_salida < '12:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 11:00 AM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '12:00' && $reparacion->hora_salida < '13:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 12:00 PM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '13:00' && $reparacion->hora_salida < '14:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            la 01:00 PM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '14:00' && $reparacion->hora_salida < '15:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 02:00 PM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '15:00' && $reparacion->hora_salida < '16:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 03:00 PM</strong></td>
                                @endif

                                @if ($reparacion->hora_salida >= '16:00' && $reparacion->hora_salida < '17:00')
                                    <td style="color: #0c63e4">
                                        <strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }}
                                            de
                                            {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a
                                            las 04:00 PM</strong></td>
                                @endif
                                <td scope="row" style="width: 10%"><strong style="text-align: left">L.
                                        {{ number_format($reparacion->costo_reparacion, 2, '.', ',') }}</strong></td>
                                <td style="text-align: center"><a class="btn btn-primary"
                                        href="{{ route('reparaciones.show', ['reparacion' => $reparacion->id]) }}"><i
                                            class="fa fa-eye" style="color: white"></i></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No hay reparaciones</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="sidebar-brand d-flex align-items-center justify-content-center">{{ $reparaciones->links() }}</div>
    </div>
</div>
