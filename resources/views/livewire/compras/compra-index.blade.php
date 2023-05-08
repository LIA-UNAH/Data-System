<div>
   {{-- Mensajes de las operaciones realizadas --}}
    {{-- Para los mensajes afirmativos y errores --}}
    @include('layouts.flash-message')
    {{-- Terminan los mensajes --}}

    {{-- filtros activos --}}
    <div>
        <p class="badge bg-secondary">Estado: {{$this->filtros['estado']['nombre']}}</p>
        <p class="badge bg-secondary">Fecha: {{$this->NombreFiltroFecha}}</p>
        <p class="badge bg-secondary">Busqueda: {{empty($this->filtros['busqueda']) ? "cualquiera":
            $this->filtros['busqueda'] }}</p>
    </div>

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold " style="color: white">Compras</h2>
            </div>


            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar y recargar producto -->
                        <div class="input-group">
                            <input wire:model="filtros.busqueda" type="text" name="buscar_compra" id="buscar_compra"
                                class="form-control bg-light border-0 small" placeholder="Buscar" aria-label="Search"
                                aria-describedby="basic-addon2">
                        </div>
                    <!-- HU8 - Buscar y recargar compras -->
                </div>

                <div style="float: right">

                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center">
                            <a class="btn btn-dark" href="/lis_compras"
                                style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                    style="color: white"></i>
                            </a>
                        </td>
                    </div>
                    <!-- Vista previa  -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center">
                            <a class="btn btn-secondary" href="{{ route('ventas.factura') }}"
                                style=" border: 2px solid #ffffff;border-radius: 4px">
                                <i class="fa fa-plus-square" style="color: white"></i>
                                Vista Previa
                            </a>
                        </td>

                        <div style="float: right; margin-left: 1px">

                        </div>
                        <!-- Aniadir -->
                        <div style="float: left; margin-left: 15px">
                            <td style="text-align: center"><a class="btn btn-success" href="{{ route('compras.crear') }}" style=" border: 2px solid #ffffff;border-radius: 4px">

                                    @php
                                        $com = App\Models\Compra::where('estado_compra','=','p')->where('user_id','=',Auth::user()->id)->get();
                                    @endphp
                                    @if($com->count() == 0)
                                    <i class="fa fa-plus-square" style="color: white"></i>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">
                                        <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0z"/>
                                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1H2zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h7.08z"/>
                                      </svg>
                                    @endif

                                </a>
                        </div>

                        <!-- Filtrar por Fecha  -->
                        <div style="text-align: center; float: left; margin-left: 15px;" class="dropdown">
                            <button style=" border: 2px solid #ffffff;border-radius: 4px"
                                class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-expanded="false">
                                Fecha
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="mb-1 px-2">
                                        <label for="" class="form-label">Inicio</label>
                                        <input wire:model.lazy="filtros.fecha_inicial"
                                            class="form-control form-control-sm" type="date">
                                    </div>
                                    <div class="mb-1 px-2">
                                        <label for="" class="form-label">Final</label>
                                        <input wire:model.lazy="filtros.fecha_final"
                                            class="form-control form-control-sm" type="date">
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"
                                        wire:click.prevent="setFiltroFecha('{{now()->toDateString('Y-m-d')}}', '{{now()->toDateString('Y-m-d')}}')">Hoy</a>
                                </li>
                                <li><a class="dropdown-item" href="#"
                                        wire:click.prevent="setFiltroFecha('{{now()->subDays(7)->toDateString('Y-m-d')}}', '{{now()->toDateString('Y-m-d')}}')">Última
                                        semana</a></li>
                                <li><a class="dropdown-item" href="#"
                                        wire:click.prevent="setFiltroFecha('{{now()->subDays(30)->toDateString('Y-m-d')}}', '{{now()->toDateString('Y-m-d')}}')">Último
                                        mes</a></li>
                            </ul>
                        </div>

                        <div style="text-align: center; float: left; margin-left: 15px; margin-right: 15px;"
                            class="dropdown">
                            <button style=" border: 2px solid #ffffff;border-radius: 4px"
                                class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" aria-expanded="false">
                                Estado
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        wire:click.prevent="setFiltroEstado('en_proceso', 'En Proceso')">En proceso</a>
                                </li>
                                <li><a class="dropdown-item"
                                        wire:click.prevent="setFiltroEstado('pagado', 'Pagado')">Pagado</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="card-body" style="padding-left: 35px; padding-right: 35px">
            <div class="table-responsive" id="tblaBody">
                <table class="table table" id="dataTable">
                    <thead class="card-header py-3" style="background: #1a202c; color: white">
                    <tr>
                        <th>Documento</th>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th>Vendedor</th>
                        <th colspan="2" style="text-align: center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($compras as $compra)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td scope="row" style="text-transform: uppercase"><strong>{{ $compra->docummento_compra }}</strong></td>
                            <td> <strong>{{\Carbon\Carbon::parse($compra->fecha_compra)->isoFormat("DD")}} de {{\Carbon\Carbon::parse($compra->fecha_compra)->isoFormat("MMMM")}}, {{\Carbon\Carbon::parse($compra->fecha_compra)->isoFormat("YYYY")}}</strong></td>
                            <td scope="row">{{ $compra->proveedor->nombre_proveedor }}</td>
                            @if($compra->estado_compra == 'p')
                                <td scope="row">Preparando</td>
                            @endif
                            @if($compra->estado_compra == 'E' ||$compra->estado_compra == 'g' )
                                <td scope="row">Finalizado</td>
                            @endif
                            <td scope="row"><strong>{{ $compra->user->name }}</strong></td>
                            @if($compra->estado_compra != 'p')
                                <td style="text-align: center"><a class="btn btn-primary" href="{{ route('compras.facturas', ['compra'=>$compra->id]) }}"><i class="fa fa-eye" style="color: white"></i></a></td>
                                <td style="text-align: center"><a class="btn btn-success" href="{{ route('compras.editar', ['id'=>$compra->id]) }}"><i class="fa fa-edit" style="color: white"></i></a></td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No hay Compras</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="col-sm-6" style="text-align: center; margin: 0 auto">{{ $compras->links() }}</div>
            </div>
        </div>


    </div>

</div>
