@extends('adminlte::page')

@section('title', 'VetSys|Mascotas')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-dog"></i>Mascotas</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header flex flex-row items-center gap-4">
        <a href="{{url('mascota/'.$mascota->id.'/edit')}}"  class="bg-yellow-400 p-2 rounded">
            Modificar mascota
        </a>
        <a  href="{{url('mascota/'.$mascota->id.'/historial-clinico')}}" class="bg-yellow-400 p-2 rounded">
            Historial Clinico
        </a>
        <a  href="{{url('mascota/'.$mascota->id.'/galeria')}}" class="bg-yellow-600 p-2 rounded">
            Galeria
        </a>
        <a  href="{{url('mascota/'.$mascota->id.'/historial-compra')}}" class="bg-yellow-400 p-2 rounded">
            Historial de compra
        </a>
    </div>
</div>  
<div id="app">
    <galeria
    :mascota='@json($mascota)'
    />
</div>

@stop

@push('css')
{{-- mix('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{ mix('resources/css/app.css') }}">
@endpush

@push('js')
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script type="module"  src="{{ mix('resources/js/mascota/galeria.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
@endpush