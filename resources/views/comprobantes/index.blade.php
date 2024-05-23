@extends('adminlte::page')

@section('title', 'VetSys|Comprobantes')

@php
$heads = [
        'Select',
        'Referencia',
        'Subtotal',
        'Impuestos',
        'Total',
        'Mascota(s)',
        'Estado',
        'Opciones'
    ];
$config = [
    'language' => [
        'url' => '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
    ],
];
@endphp

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-fw fa-dolly-flatbed"></i> Ventas</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Listado de Comprobantes</h3>
    </div>
    <div class="card-body">
        @if (session('msg'))
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <x-adminlte-alert theme="success" id='success-alert' title="" dismissable>
                    {{session('msg')}}
                    </x-adminlte-alert>
                </div>
            </div>
        @endif

        <div class="row">
            <x-adminlte-datatable id="example" :heads="$heads" head-theme="light" striped hoverable bordered compressed beautify  with-buttons :config="$config">
                @foreach ($comprobantes as $comprobante)

                    <tr>

                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
    $(document).ready(function() {
        $('.eliminar-venta').on('click', function() {
            let referencia = $(this).data('referencia');

            if (confirm('Va a eliminar la venta '+ referencia +', esta acción no se puede deshacer. ¿Continuar?')) {
                return true;
            }

            return false;
        });
    });
</script>

<style>
    .mascotas {
        margin: 0;
        padding: 10px;
        list-style-type: none;
        text-align: left;
    }

    .eliminar-venta {
        border: none;
    }
</style>

@endpush
