@extends('adminlte::page')
@section('title', 'VetSys|Clientes')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-fw fa-dolly-flatbed"></i> Ventas</h1>
@stop

@php
$heads = [
        'Select',
        'Item',
        'Valor Unitario',
        'Cantidad',
        'Subtotal',
        'Impuestos',
        'Total',
        'Mascota',
        'Opciones'
    ];
$config = [
    'language' => [
        'url' => '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
    ],
];
@endphp

@section('content')
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Crear Venta</h3>
    </div>
    <form action="{{ url('ventas') }}" method="post">
        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            <div class="mb-4 row">
                <div class="col-md-12">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href="{{url('cliente/create')}}" class="btn btn-info btn-sm">Crear Cliente</a>
                        </div>

                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href="{{url('mascota/create')}}" class="btn btn-info btn-sm">Crear Mascota</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control form-control-sm" id="lista-clientes" name="cliente" required>
                            <option value="" disabled selected>* Cliente...</option>

                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->Nombre .' '. $cliente->Apellido }} | {{ $cliente->DocumentoIdentidad }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <a href="" id="seleccionar-cliente" class="btn btn-info btn-sm">Seleccionar Cliente</a>
                </div>
            </div>

            <div id="items" class="mt-4 d-none">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control form-control-sm" id="lista-items" name="item" required>
                                <option value="" disabled selected>* Item...</option>

                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" data-precio-unitario="{{ $item->PrecioVenta ?? $item->PrecioServicio }}">{{ $item->Producto ?? $item->Servicio }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <a href="" id="seleccionar-item" class="btn btn-info btn-sm">Seleccionar Item</a>
                    </div>
                </div>

                <div class="mt-3 row">
                    <div class="col-md-12">
                        <x-adminlte-datatable id="tabla-items" :heads="$heads" head-theme="light" striped hoverable bordered compressed beautify :config="$config">
                        </x-adminlte-datatable>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-grid gap-3 d-md-block">
                        <button type="submit" class="btn bg-gradient-primary btn-sm"><i class="fas fa-fw fa-save"></i> Crear Venta</button>
                        <button type="reset" class="btn bg-gradient-warning btn-sm"><i class="fas fa-fw fa-window-close"></i> Cancelar</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" d-md-flex justify-content-md-end">
                        <a href="{{url('ventas')}}" class="btn bg-gradient-secondary btn-sm" ><i class="fas fa-fw fa-undo-alt"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<select class="d-none" id="lista-global-mascotas">

    @foreach ($mascotas as $mascota)
        <option value="{{ $mascota->id }}" data-cliente_id="{{ $mascota->idCliente }}">{{ $mascota->Mascota }}</option>
    @endforeach

</select>

@stop

@push('js')
<script>
    $(document).ready(function() {
        // Lista de clientes (select2)
        // Lista de ítems (select2)

        $('#lista-clientes').select2();
        $('#lista-items').select2();

        (function() {
            let tabla_items = $('#tabla-items');
            let empty = '<tr><td valign="top" colspan="9" class="dataTables_empty">Ningún dato disponible en esta tabla</td></tr>';

            // Seleccionar cliente

            $('#seleccionar-cliente').on('click', function() {
                let btn = $(this);
                let cliente = $('#lista-clientes');
                let items = $('#items');
                let clicked = false;

                if (cliente.val() === null) {
                    alert('Seleccione un cliente.');

                    return false;
                }

                btn.data('clicked', !btn.data('clicked'));
                clicked = $(this).data('clicked');

                if (clicked) {
                    btn.addClass('btn-danger').removeClass('btn-info');
                    btn.text('Remover Cliente');
                    items.removeClass('d-none');
                }

                if (!clicked) {
                    btn.addClass('btn-info').removeClass('btn-danger');
                    btn.text('Seleccionar Cliente');
                    items.addClass('d-none');

                    cliente.val(null).trigger('change');
                    tabla_items.find('tbody').html(empty);
                }

                return false;
            });

            // Seleccionar item

            $('#seleccionar-item').on('click', function() {
                let btn = $(this);
                let item = $('#lista-items');
                let mascotas = $('#lista-global-mascotas');
                let cliente_id = $('#lista-clientes option:selected').val();

                let item_seleccionado = item.find('option:selected');

                let nombre_item = item_seleccionado.text();
                let precio_unitario = parseFloat(item_seleccionado.data('precio-unitario')).toFixed(2).replace('.', ',');

                let fila;

                if (item.val() === null) {
                    alert('Seleccione un ítem.');

                    return false;
                }

                item.val(null).trigger('change');

                if (tabla_items.find('.dataTables_empty').length) {
                    tabla_items.find('tbody').html('');
                }

                fila += '<tr>';
                    fila += '<td>';
                        fila += '<input type="checkbox">';
                    fila += '</td>';
                    fila += '<td>';
                        fila += nombre_item;
                    fila += '</td>';
                    fila += '<td>';
                        fila += '$ '+ precio_unitario;
                    fila += '</td>';
                    fila += '<td>';
                        fila += '<input class="form-control form-control-sm" type="number" min="0" value="1">';
                    fila += '</td>';
                    fila += '<td>';
                        fila += '$ '+ precio_unitario;
                    fila += '</td>';
                    fila += '<td>';
                        fila += '$ 0,00';
                    fila += '</td>';
                    fila += '<td>';
                        fila += '$ '+ precio_unitario;
                    fila += '</td>';
                    fila += '<td>';
                        fila += '<select class="form-control form-control-sm" name="mascota[]">';

                            mascotas.find('option').each(function() {
                                if ($(this).data('cliente_id') == cliente_id) {
                                    fila += '<option val="'+ $(this).val() +'">';
                                        fila += $(this).text();
                                    fila += '</option>';
                                }
                            });

                        fila += '</select>';
                    fila += '</td>';
                    fila += '<td>';
                    fila += '</td>';
                fila += '</tr>';

                tabla_items.find('tbody').append(fila);

                return false;
            });
        })();
    });
</script>

<style>
    #items .select2-container {
        width: 100% !important;
    }

    #tabla-items_wrapper .row:first-child {
        display: none;
    }
</style>
@endpush
