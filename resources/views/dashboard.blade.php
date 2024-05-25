@extends('adminlte::page')

@section('title', 'VetSys | Escritorio')

@section('content_header')
    <h1 class="m-0 text-dark">Escritorio</h1>
@stop
@section('content')
@yield('content_body')
<div class="row">
    <div class="col-sm-2">
        <a href="/cliente">
            <div class="info-box" style="background-color:#3c8dbc; color:#fff">
                <div class="info-box-content align-items-center">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>
                    <span class="info-box-text">Cientes</span>
                </div>
            </div>
        </a>   
    </div>
    <div class="col-sm-2">
        <a href="/mascota">
            <div class="info-box" style="background-color: #ff851b; color:white">   
                <div class="info-box-content align-items-center">
                    <span class="info-box-icon"><i class="fas fa-dog"></i></span>
                    <span class="info-box-text">Mascotas</span>
                </div>
            </div>
        </a>    
    </div>
    <div class="col-sm-2">
        <a href="/producto">
            <div class="info-box" style="background-color: #007bff; color:white"    >   
                <div class="info-box-content align-items-center">
                    <span class="info-box-icon"><i class="fas fa-box-open"></i></span>
                    <span class="info-box-text">Productos</span>
                </div>
            </div>
        </a>    
    </div>
    <div class="col-sm-2">
        <a href="/servicio">
            <div class="info-box" style="background-color: #dc3545; color:white">   
                <div class="info-box-content align-items-center">
                    <span class="info-box-icon"><i class="fas fa-briefcase-medical"></i></span>
                    <span class="info-box-text">Servicios</span>
                </div>
            </div>
        </a>    
    </div>
    <div class="col-sm-2">
        <a href="/proveedor">
            <div class="info-box"  style="background-color: #17a2b8; color:white">   
                <div class="info-box-content align-items-center">
                    <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>
                    <span class="info-box-text">Proveedores</span>
                </div>
            </div>
        </a>    
    </div>
    <div class="col-sm-2">
        <a href="/evento">
            <div class="info-box bg-success">   
                <div class="info-box-content align-items-center">
                    <span class="info-box-icon"><i class="fas fa-calendar"></i></span>
                    <span class="info-box-text">Eventos</span>
                </div>
            </div>
        </a>    
    </div>
    <div class="col-sm-2">
        <a href="/inventario">
            <div class="info-box bg-warning" >   
                <div class="info-box-content align-items-center">
                    <span class="info-box-icon"><i class="fas fa-boxes"></i></span>
                    <span class="info-box-text">Inventario</span>
                </div>
            </div>
        </a>    
    </div>
</div>
@stop
@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '4.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'DennisSoft 2024') }}
        </a>
    </strong>
@stop