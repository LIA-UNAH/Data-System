<div>
    <div style="height: calc(85vh);">
        <div class="ed-grid s-grid-1 m-grid-1 lg-grid-3" >
            <div>
                <div class="card" style="height: 100%" >
                    <div class="card-body" >
                        <div class="row">
                            <div class="col" style="width: 50%;">
                                <label for="">Desde</label>
                                <input type="date" name="" id="" wire:model='fecha_desde' class="form-control" >
                            </div>
                            <div class="col" style="width: 50%;">
                                <label for="">Hasta</label>
                                <input type="date" name="" id="" wire:model='fecha_hasta' class="form-control">
                            </div>
                        </div>
                        <ul class="list" style="display: block; overflow:auto; height: calc(58vh);">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($historial as $histo)
                                <li class="item"  wire:click='ver_detalles({{ $histo->id }},{{ $count }})'>
                                    <i class="left-icon far @if($id_venta == $histo->id )
                                            fa-check-circle
                                        @else
                                            fa-circle
                                        @endif "></i>
                                    <div>
                                        {{ $histo->fecha_factura.' - '.$histo->numero_factura_venta.' Total: L. '.$histo->total }}
                                    </div>
                                    <!-- <i class="right-icon far fa-trash-alt"></i> -->
                                </li>
                                @php
                                    $count = $count + 1;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="s-cols-2" style="height: 100%;overflow-y: auto;">

                <div class="card">
                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>N#</th>
                                    <th>Descripcion</th>
                                    <th>unidades</th>
                                    <th>Precio U</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $ite = 0;
                                    $total = 0;
                                @endphp

                                @foreach ( $detalleshistorial as $i => $items )
                                    <tr>
                                        <td>{{ ++$ite }}</td>
                                        <td>{{ $items->producto->marca.' '.$items->producto->modelo}}</td>
                                        <td>{{ $items['cantidad_detalle_venta'] }}</td>
                                        <td>{{ $items['precio_venta'] }}</td>
                                        <td style="text-align: right">{{ $items['cantidad_detalle_venta']*$items['precio_venta'] }}</td>
                                        @php
                                            $total+= $items['cantidad_detalle_venta']*$items['precio_venta'];
                                        @endphp
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td style="text-align: right"><strong>{{ $total }}</strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
