@extends('adminlte::page')

@section('title', 'VetSys|Clientes')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-users"></i> Mascotas</h1>
@stop

@section('content')
<div class="card card-success">
    <!-- <div class="card-header">
        <h3 class="card-title">Registrar Cliente</h3>
    </div> -->
    <form action="{{ url('cliente') }}" method="post">
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
        
        <div class="row">
            <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Registro de Mascotas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    </form>
</div>  

@stop


@push('js')

<script>
    $(document).ready(function() {

        

        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var labels = {!! json_encode($result->pluck('Mes'))!!};
        var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
        }

    var barChart = new Chart(barChartCanvas, {
      type: 'pie', 
      data: {
            labels: labels,
            datasets: [{
                data: {!! json_encode($result->pluck('Total'))!!},
                backgroundColor: [
                    'rgba(0, 123, 255, 0.8)'
                ],
            }]
        },
      options: barChartOptions
    });

    });
</script>
@endpush