@php
$heads = [
    'cantidad',
    'descripcion',
    'tipo',
    'vu',
    'subtotal',
    // 'Impuestos',
    'importe',
];
$heads_pagos = [
    'fecha',
    'tipo de pago',
    'monto',
   
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
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                padding: 20px;
                background-color: #f8f9fa;
            }
        
            .card {
                border: 1px solid #dee2e6;
                border-radius: .25rem;
                box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05);
            }
        
            .card-header {
                background-color: #28a745;
                color: white;
                font-weight: bold;
            }
        
            .card-body {
                padding: 1.25rem;
            }
        
            .card-body h5 {
                margin-bottom: 1rem;
                color: #28a745;
            }
        
            .card-body label {
                display: block;
                margin-bottom: .5rem;
            }
        
            .card-body .row {
                margin-bottom: 2rem;
            }
        
            .card-body .row:last-child {
                margin-bottom: 0;
            }
        
            table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                border-collapse: collapse;
            }
        
            table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
                background-color: #e9ecef;
                color: #495057;
            }
        
            table td {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }
        
            ul {
                padding-left: 0;
                list-style: none;
            }
        
            ul li {
                display: flex;
                justify-content: space-between;
                margin-bottom: .25rem;
            }
        
            ul li:last-child {
                font-weight: bold;
                color: #28a745;
            }

            .small-font {
                font-size: 0.8em;
            }

            .header {
                width: 100%;
                margin-bottom: 5px;
            }

            .company-info, {
                width: 100%; /* Reduced width to account for padding and border */
                padding: 5px;
                border: 1px solid #dee2e6;
                border-radius: .25rem;
                box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05);
            }

  
        </style>

        <div class="header">
            <div class="company-info small-font">

                <p>Dirección: Lima 4500</p>
                <p>Email: veterinario@gmail.com</p>
                <p>Número: 113151651</p>
                <p>RUC 2343243423</p>
                <p>Comprobante {{ str_pad($comprobante->serie, 3, '0', STR_PAD_LEFT) }}-{{ str_pad($comprobante->comprobante, 8, '0', STR_PAD_LEFT) }}</p>
            </div>
           
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="w-100">
                            <strong>Adquiriente</strong>
                           {{ $comprobante->cliente->Nombre }} {{ $comprobante->cliente->Apellido }}
                        </label>
                        <label class="w-100">
                            <strong>Documento</strong>
                            {{ $comprobante->cliente->DocumentoIdentidad }}
                        </label>
                        <label class="w-100">
                            <strong>Email</strong>
                            {{ $comprobante->cliente->Email }}
                        </label>
                        
                        <label class="w-100">
                            <strong>Dirección</strong> {{ $comprobante->cliente->Direccion ?? '-' }}
                        </label>
                    </div>
                </div>

            </div>
        </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="d-block">Venta</h5>

                        <x-adminlte-datatable id="tabla-items" :heads="$heads" head-theme="light" striped hoverable bordered compressed beautify :config="$config">
                            @foreach ($comprobante->venta->items as $item)
                                <tr>
                                    <td><span class="unidades-item">{{ intval($item->cantidad) }}</span></td>
                                    <td>{!! !is_null($item->servicio_id) ? ($item->servicio->Servicio ?? '<span class="text-danger">Servicio no encontrado</span>') : ($item->producto->Producto ?? '<span class="text-danger">Producto no encontrado</span>') !!}</td>
                                    <td>{{ !is_null($item->servicio_id) ? 'Servicio' : 'Producto' }}</td>
                                    <td>{{ Prices::symbol() }} <span class="precio-item precio-unitario">{{ number_format(($item->subtotal / $item->cantidad), 2, ',', '') }}</span></td>
                                   
                                    <td>{{ Prices::symbol() }} <span class="precio-item precio-subtotal">{{ number_format($item->subtotal, 2, ',', '') }}</span></td>
                                    {{-- <td>{{ Prices::symbol() }} <span class="precio-item precio-impuestos">{{ number_format($item->impuestos, 2, ',', '') }}</span></td> --}}
                                    <td>{{ Prices::symbol() }} <span class="precio-item precio-total">{{ number_format($item->total, 2, ',', '') }}</span></td>
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

                <div class="row">
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
            
    </body>
</html>
