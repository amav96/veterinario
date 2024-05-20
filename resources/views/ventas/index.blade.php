@extends('adminlte::page')

@section('title', 'VetSys|Clientes')

@php
$heads = [
        'Select',
        'Referencia',
        'Subtotal',
        'Impuestos',
        'Total',
        'Mascota(s)',
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
        <h3 class="card-title">Listado de Ventas</h3>
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

        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="Third group">
                <a href="{{url('ventas/create')}}" class="btn btn-info btn-sm">Crear venta</a>
            </div>

            {{-- <div class="btn-group mr-2" role="group" aria-label="Third group">
                <button type="button" class="btn btn-danger btn-sm">Auditoria</button>
            </div> --}}

        </div>

        <hr>

        <div class="row">
            <x-adminlte-datatable id="example" :heads="$heads" head-theme="light" striped hoverable bordered compressed beautify  with-buttons :config="$config">
                @foreach ($ventas as $venta)

                    @php

                    $venta_referencia = str_pad($venta->id, 8, '0', STR_PAD_LEFT);

                    @endphp

                    <tr>
                        <td>
                            <input type="checkbox" name="" id="">
                        </td>
                        <td>
                            Venta #{{ $venta_referencia }}
                        </td>
                        <td>
                            $ {{ number_format($venta->subtotal, 2, ',') }}
                        </td>
                        <td>
                            $ {{ number_format($venta->impuestos, 2, ',') }}
                        </td>
                        <td>
                            $ {{ number_format($venta->total, 2, ',') }}
                        </td>
                        <td>
                            @foreach ($venta->cliente->getMascotas as $mascota)

                                <p class="m-0">{{ $mascota->Mascota }}</p>

                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('ventas.destroy', $venta->id) }}" method="post">
                                <button type="submit" class="eliminar-venta" title="Eliminar venta {{ $venta_referencia }}" data-referencia="{{ $venta_referencia }}">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>

                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
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
