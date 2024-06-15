@php
$heads = [
    'Item',
    'Tipo',
    'Valor Unitario',
    'Cantidad',
    'Subtotal',
    'Impuestos',
    'Total',
    'Mascota',
];
$heads_pagos = [
    'Fecha',
    'Medio de pago',
    'Monto',
    'Motivo',
    'Movimiento',
    'Opciones'
];
$config = [
    'language' => [
        'url' => '',
    ],
    'bPaginate' => false
];
@endphp

<html>
    <head>
        <link rel="stylesheet" href="http://vetsys10.local/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://vetsys10.local/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="http://vetsys10.local/vendor/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    </head>

    <body>
        <style>
            nav,
            aside,
            .dataTables_wrapper > div:first-child,
            .dataTables_wrapper > div:last-child {
                display: none !important;
            }

            .content-wrapper {
                margin: 0 !important;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

                .content-wrapper input {
                    box-sizing: border-box;
                }

            ul {
                list-style-type: none;
                text-align: right;
            }

                ul li {
                    display: grid;
                    grid-template-columns: 1fr auto;
                    gap: 25px;
                }

            #tabla-pagos tr th:last-child,
            #tabla-pagos tr td:last-child {
                display: none;
            }
        </style>

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Comprobante N° {{ str_pad($comprobante->serie, 3, '0', STR_PAD_LEFT) }}-{{ str_pad($comprobante->comprobante, 8, '0', STR_PAD_LEFT) }}</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="d-block">Cliente</h5>
                    </div>

                    <div class="mt-4 col-md-12">
                        <label class="w-100">Nombre y apellido
                            <input type="text" class="form-control form-control-sm" name="cliente" value="{{ $comprobante->cliente->Nombre }} {{ $comprobante->cliente->Apellido }}" placeholder="" readonly>
                        </label>
                        <label class="w-100">Cliente
                            <input type="number" class="form-control form-control-sm" name="documento_identidad" value="{{ $comprobante->cliente->DocumentoIdentidad }}" placeholder="" min="0" readonly>
                        </label>
                        <label class="w-100">Cliente
                            <input type="date" class="form-control form-control-sm" name="fecha_nacimiento" value="{{ $comprobante->cliente->FechaNacimiento }}" placeholder="" min="0" readonly>
                        </label>
                        <label class="w-100">Email
                            <input type="text" class="form-control form-control-sm" name="email" value="{{ $comprobante->cliente->Email }}" placeholder="" readonly>
                        </label>
                        <label class="w-100">Departamento
                            <input type="text" class="form-control form-control-sm" name="departamento" value="{{ $comprobante->cliente->departamento->Departamento }}" placeholder="" readonly>
                        </label>
                        <label class="w-100">Provincia
                            <input type="text" class="form-control form-control-sm" name="provincia" value="{{ $comprobante->cliente->provincia->Provincia }}" placeholder="" readonly>
                        </label>
                        <label class="w-100">Distrito
                            <input type="text" class="form-control form-control-sm" name="distrito" value="{{ $comprobante->cliente->distrito->Distrito }}" placeholder="" readonly>
                        </label>
                        <label class="w-100">Dirección
                            <input type="text" class="form-control form-control-sm" name="direccion" value="{{ $comprobante->cliente->Direccion ?? '-' }}" placeholder="" readonly>
                        </label>
                    </div>
                </div>

                <div class="mt-4 row">
                    <div class="col-md-12">
                        <h5 class="d-block">Venta</h5>

                        <x-adminlte-datatable id="tabla-items" :heads="$heads" head-theme="light" striped hoverable bordered compressed beautify :config="$config">
                            @foreach ($comprobante->venta->items as $item)
                                <tr>
                                    <td>{!! !is_null($item->servicio_id) ? ($item->servicio->Servicio ?? '<span class="text-danger">Servicio no encontrado</span>') : ($item->producto->Producto ?? '<span class="text-danger">Producto no encontrado</span>') !!}</td>
                                    <td>{{ !is_null($item->servicio_id) ? 'Servicio' : 'Producto' }}</td>
                                    <td>{{ Prices::symbol() }} <span class="precio-item precio-unitario">{{ number_format(($item->subtotal / $item->cantidad), 2, ',', '') }}</span></td>
                                    <td>x <span class="unidades-item">{{ intval($item->cantidad) }}</span> u.</td>
                                    <td>{{ Prices::symbol() }} <span class="precio-item precio-subtotal">{{ number_format($item->subtotal, 2, ',', '') }}</span></td>
                                    <td>{{ Prices::symbol() }} <span class="precio-item precio-impuestos">{{ number_format($item->impuestos, 2, ',', '') }}</span></td>
                                    <td>{{ Prices::symbol() }} <span class="precio-item precio-total">{{ number_format($item->total, 2, ',', '') }}</span></td>
                                    <td>{!! $item->mascota->Mascota ?? '<span class="text-danger">Mascota no encontrada</span>' !!}</td>
                                </tr>
                            @endforeach
                        </x-adminlte-datatable>

                        <div id="totales">
                            <ul>
                                <li><div>Valor de venta bruto (sin descuentos)</div><div>{{ Prices::symbol() }} <span class="valor-venta-sin-descuentos">0.00</span></div></li>
                                <li><div>Total descuentos</div><div>{{ Prices::symbol() }} <span class="valor-total-descuentos">0,00</span></div></li>
                                <li><div>Valor de venta (con descuentos)</div><div>{{ Prices::symbol() }} <span class="valor-venta-con-descuentos">0,00</span></div></li>
                                <li><div>Impuestos</div><div>{{ Prices::symbol() }} <span class="valor-impuestos">0,00</span></div></li>
                                <li><div>TOTAL FINAL</div><div>{{ Prices::symbol() }} <span class="valor-total">0,00</span></div></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-4 row">
                    <div class="col-md-12">
                        <h5 class="d-block">Pagos</h5>

                        <div class="row">
                            <div class="col-md-12">
                                <x-adminlte-datatable id="tabla-pagos" :heads="$heads_pagos" head-theme="light" striped hoverable bordered compressed beautify :config="$config">
                                    @foreach ($comprobante->pagos as $pago)
                                        <tr>
                                            <td>{{ $pago->created_at }}</td>
                                            <td>{{ $pago->medio_pago->FormaDePago }}</td>
                                            <td class="{{ $pago->tipo_movimiento_id == 3 ? 'text-danger' : 'text-success' }}">{{ Prices::symbol() }} {{ number_format($pago->importe, 2, ',', '') }}</td>
                                            <td>{{ $pago->motivo ?? '—' }}</td>
                                            <td>{{ $pago->tipo_movimiento->nombre }}</td>
                                            <td>
                                                @if (!$pago->anulado)

                                                    <a href="" class="eliminar-item" data-pago_id="{{ $pago->id }}" title="Anular este pago">
                                                        <i class="fas fa-fw fa-trash"></i>
                                                    </a>

                                                @else

                                                    —

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-adminlte-datatable>

                                <div id="pagos">
                                    <ul>
                                        <li><div>Dinero recibido</div><div>{{ Prices::symbol() }} <span class="valor-dinero-recibido">{{ number_format($comprobante->dinero_recibido, 2, ',', '') }}</span></div></li>
                                        <li><div>Saldo pendiente</div><div>{{ Prices::symbol() }} <span class="valor-saldo-pendiente">{{ number_format($comprobante->saldo_pendiente, 2, ',', '') }}</span></div></li>
                                        <li><div>Cambio / vuelto</div><div>{{ Prices::symbol() }} <span class="valor-vuelto">{{ number_format($comprobante->vuelto, 2, ',', '') }}</span></div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
