<div>
    {{-- Mensajes de las operaciones realizadas --}}
    {{-- Para los mensajes afirmativos y sin errores --}}
    @if (session()->has('suce'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suce') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Para los mensajes de errores --}}
    @if (session()->has('erorr'))
        <div class="alert alert-danger" role="alert">
            {{ session('erorr') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}
   
    
    {{-- filtros activos --}}
    <div>
        <p class="badge bg-secondary">Estado: {{$this->filtros['estado']['nombre']}}</p>
        <p class="badge bg-secondary">Fecha: {{$this->NombreFiltroFecha}}</p>
        <p class="badge bg-secondary">Busqueda: {{empty($this->filtros['busqueda']) ? "cualquiera": $this->filtros['busqueda'] }}</p>
    </div>

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold " style="color: white">Ventas</h2>
            </div>

            
            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar y recargar producto -->

                    <form action="{{ route('ventas.searchIndex') }}" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input wire:model="filtros.busqueda" type="text" name="buscar_venta" id="buscar_venta"
                                class="form-control bg-light border-0 small" placeholder="Buscar" aria-label="Search"
                                aria-describedby="basic-addon2">
                        </div>
                    </form>
                    <!-- HU8 - Buscar y recargar venta -->
                </div>

                <div style="float: right">

                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/ventas"
                                style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                    style="color: white"></i></a>
                    </div>
                    <!-- Vista previa  -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center">
                            <a 
                                class="btn btn-secondary" 
                                href="{{ route('ventas.factura') }}"
                                style=" border: 2px solid #ffffff;border-radius: 4px"
                            >
                                <i class="fa fa-plus-square" style="color: white"></i> 
                                Vista Previa
                            </a>
                        </td>

                            <div style="float: right; margin-left: 1px">

                    </div>
                    <!-- Aniadir -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-success" href="{{ route('ventas.create') }}"
                                style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                    style="color: white"></i></a>
                        </td>
                    </div>


                    <!-- Filtrar por Fecha  -->
                    <div style="text-align: center; float: left; margin-left: 15px;" class="dropdown">
                        <button 
                            style=" border: 2px solid #ffffff;border-radius: 4px" 
                            class="btn btn-secondary dropdown-toggle" 
                            type="button" 
                            data-bs-toggle="dropdown" 
                            data-bs-auto-close="outside"
                            aria-expanded="false">
                            Fecha
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mb-1 px-2">
                                    <label for="" class="form-label">Inicio</label>
                                    <input wire:model.lazy="filtros.fecha_inicial" class="form-control form-control-sm" type="date">
                                </div>
                                <div class="mb-1 px-2">
                                    <label for="" class="form-label">Final</label>
                                    <input wire:model.lazy="filtros.fecha_final" class="form-control form-control-sm" type="date">
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" wire:click.prevent="setFiltroFecha('{{now()->toDateString('Y-m-d')}}', '{{now()->toDateString('Y-m-d')}}')">Hoy</a></li>
                            <li><a class="dropdown-item" href="#" wire:click.prevent="setFiltroFecha('{{now()->subDays(7)->toDateString('Y-m-d')}}', '{{now()->toDateString('Y-m-d')}}')">Última semana</a></li>
                            <li><a class="dropdown-item" href="#" wire:click.prevent="setFiltroFecha('{{now()->subDays(30)->toDateString('Y-m-d')}}', '{{now()->toDateString('Y-m-d')}}')">Último mes</a></li>
                        </ul>
                    </div>

                    <div style="text-align: center; float: left; margin-left: 15px; margin-right: 15px;" class="dropdown">
                        <button 
                            style=" border: 2px solid #ffffff;border-radius: 4px" 
                            class="btn btn-secondary dropdown-toggle" 
                            type="button" 
                            data-bs-toggle="dropdown" 
                            data-bs-auto-close="false"
                            aria-expanded="false">
                            Estado
                        </button>
                        <ul class="dropdown-menu">
                          <li><a 
                                class="dropdown-item" 
                                wire:click.prevent="setFiltroEstado('en_proceso', 'En Proceso')">En proceso</a></li>
                          <li><a 
                                class="dropdown-item"  
                                wire:click.prevent="setFiltroEstado('pagado', 'Pagado')">Pagado</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
    
    <div class="card-body" style="padding-left: 35px; padding-right: 35px">
        <div class="table-responsive" id="tblaBody">
            <table class="table" id="dataTable">
                <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>
                        <th>Factura</th>
                        <th>Empleado</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th colspan="3">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $venta)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td> <strong>{{ $venta->numero_factura_venta }}</strong></td>
                            <td>{{ $venta->user->name }}</td>
                            <td>{{ $venta->cliente->name }}</td>
                            <td>L {{ number_format($venta->total, 2, '.', ',') }}</td>
                            <td> <strong>{{ \Carbon\Carbon::parse($venta->fecha_factura)->isoFormat('DD') }} de
                                    {{ \Carbon\Carbon::parse($venta->fecha_factura)->isoFormat('MMMM') }},
                                    {{ \Carbon\Carbon::parse($venta->fecha_factura)->isoFormat('YYYY') }}</strong>
                            </td>
                            <td>
                                <span class="badge rounded-pill text-bg-light p-2 shadow-sm">{{$venta->estado === "en_proceso" ? "En Proceso" : "Pagada"}}</span>
                            </td>

                            <td>
                                <div class="d-flex col-8">
                                    <a class="btn btn-info mr-2" href="{{ route('ventas.facturas', ['id' => $venta->id]) }}">Ver</a>

                                    @if ($venta->estado == 'en_proceso')
                                        <a class="btn btn-success mr-2" href="{{route('ventas.edit', ['id' => $venta->id])}}">Editar</a>
                                        <a 
                                            class="btn btn-danger mr-2" 
                                            href="#" 
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal_eliminar_cliente">
                                            Eliminar
                                        </a>
                                    @endif

                                    
                                </div>

                            </td>
                        @empty
                        <tr>
                            <td colspan="8">No hay Ventas disponibles</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="col-sm-6" style="text-align: center; margin: 0 auto">{{ $ventas->links() }}</div>
        </div>
    </div>
</div>
