@extends('adminlte::page')

@section('title', 'VetSys|Eventos')
@section('css')

@stop
@php
$config = [
    "singleDatePicker" => true,
    "showDropdowns" => true,
    "startDate" => "js:moment()",
    "minYear" => 2000,
    "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
    "timePicker" => true,
    "timePicker24Hour" => true,
    "timePickerSeconds" => true,
    "cancelButtonClasses" => "btn-danger",
    "locale" => ["format" => "YYYY-MM-DD HH:mm:ss"],
];
@endphp

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-calendar-day"></i>  Eventos</h1>
@stop

@section('content')
<div class="card card-primary">
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
            <div class="col-md-12">
                <div id="calendar"></div>
            </div>
        </div>
        <!-- Modal-->
        <div class="modal fade" id="ModalNew" role="modal-dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="ModalTitulo"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="Tipo" name="Tipo" value="">
                            <input type="hidden" id="idDb" name="idDb" value="">
                            <div class="col-md-6">
                                <div class="form-group" id="PropietarioN">
                                    <select class="form-control form-control-sm" id="Propietario" name="Propietario" required style="width: 100%;">
                                        <option value="">* Propietario...</option>
                                        @foreach ($clientes as $clie)
                                        <option value="{{$clie->id}}">{{$clie->Nombre.' '.$clie->Apellido.' | '.$clie->DocumentoIdentidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="PropietarioU">
                                    <input type="text" class="form-control form-control-sm" id="PropietarioM" name="PropietarioM" value="" placeholder="" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <input type="datetime-local" class="form-control form-control-sm" id="FechaInicio" name="FechaInicio" value="" placeholder="Fecha de Inicio">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="Evento" name="Evento" value="" placeholder="Evento" >
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="TipoEvento" name="TipoEvento" required>
                                        <option value="">* Tipo Evento ...</option>
                                        @foreach ($tiposEvento as $te)
                                        <option value="{{$te->id}}">{{$te->TipoEvento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="Responsable" name="Responsable" required>
                                        <option value="">* Responsabe ...</option>
                                        @foreach ($users as $us)
                                        <option value="{{$us->id}}">{{$us->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="MascotaN">
                                    <select class="form-control form-control-sm" id="Mascota" name="Mascota" required>
                                        <option value="">* Mascota ...</option>
                                    </select>
                                </div>
                                <div class="form-group" id="MascotaU">
                                    <input type="text" class="form-control form-control-sm" id="MascotaM" name="MascotaM" value="" placeholder="" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <input type="datetime-local" class="form-control form-control-sm" id="FechaFin" name="FechaFin" value="" placeholder="Fecha Fin">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sticky-note"></i>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="Observacion" name="Observacion" value="" placeholder="Observacion">
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="EstadoEvento" name="EstadoEvento" required>
                                        <option value="">* Estado Evento ...</option>
                                        @foreach ($estadoEvento as $ee)
                                        <option value="{{$ee->id}}">{{$ee->EstadoEvento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="Notificacion" name="Notificacion" required>
                                        <option value="">* Notificacion ...</option>
                                        @foreach ($notificacion as $no)
                                        <option value="{{$no->id}}">{{$no->notificacion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="submit" id="BtnSend" class="btn btn-primary">Guardar</button> -->
                        <button type="button" id="BtnSend" class="btn btn-primary">Guardar</button>
                        <button type="button" id="BtnSendM" class="btn btn-primary">Modificar</button>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
    var SITEURL = "{{ url('/') }}";
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar')
        let calendar = new FullCalendar.Calendar(calendarEl,  {
            initialView: 'dayGridMonth',
            editable:true,
            selectable:true,
            locale:'es',
            height: 800,
            headerToolbar:{
                start: 'today prev,next',
                center: 'title',
                end: 'dayGridMonth,timeGridWeek,timeGridDay,list'
            },
            buttonText:{
                today:    'hoy',
                month:    'mes',
                week:     'semana',
                day:      'dia',
                list:     'lista'
                },
            events: @json($allEventos),
            dateClick: function(info) {
                $('#PropietarioN').show();
                $('#PropietarioU').hide();
                cleanForm();
                $('#BtnSend').show();
                $('#BtnSendM').hide();
                $('#Tipo').val('1');
                // $('#BotonAgregar').show();
                // $('#BotonModificar').hide();
                // $('#BotonBorrar').hide();
                // if (info.allDay) {
                //     $('#FechaInicio').val(info.dateStr);
                //     $('#FechaFin').val(info.dateStr);
                // } else {
                //     let fechaHora = info.dateStr.split("T");
                //     $('#FechaInicio').val(fechaHora[0]);
                //     $('#FechaFin').val(fechaHora[0]);
                //     $('#HoraInicio').val(fechaHora[1].substring(0, 5));
                // }
                $("#ModalNew").modal();
            },    
            eventClick: function(info) {
                console.log(info);
                $('#PropietarioN').hide();
                $('#PropietarioU').show();
                $('#PropietarioM').val(info.event.extendedProps.idCliente);

                $('#MascotaN').hide();
                $('#MascotaU').show();
                $('#MascotaM').val(info.event.extendedProps.idMascota);

                //$('#Propietario').val(info.event.extendedProps.idCliente);
                $('#Observacion').val(info.event.extendedProps.Observacion);
                
                $('#FechaInicio').val(info.event.start);
                $('#Evento').val(info.event.title);
                $('#TipoEvento').val(info.event.extendedProps.idTipoEvento);
                $('#Responsable').val(info.event.extendedProps.idUsuario);
                $('#Mascota').val(info.event.extendedProps.idMascota);
                $('#FechaFin').val(info.event.end)
                $('#EstadoEvento').val(info.event.extendedProps.idEstadoEvento);
                $('#Notificacion').val(info.event.extendedProps.idNotificacion);
                $('#idDb').val(info.event.extendedProps.idDb);   
                $('#BtnSend').hide();
                $('#BtnSendM').show();
                $('#Tipo').val('2');
                $("#ModalNew").modal('show');

               
            },
        })
        calendar.render();

        $('#Propietario').select2({
            dropdownParent: $('#ModalNew')
        });
    
        $("#Propietario").change(function(){
            $("#Mascota").empty();
            $.ajax({  
                type: "GET",  
                url: "/getMascotas/"+$(this).val(),    
                dataType: "json", 
                success: function (data) { 
                    var option = "<option value=''>* Mascota...</option>";
                    $.each(data, function(i,item){
                        option = option+"<option value='" + item.id + "'>"+ item.Mascota+ "</option>";
                    });
                    $("#Mascota").append(option);
                }, //End of AJAX Success function  
                });        
        });

        $('#BtnSend').click(function() {
            let registro = getForm();
            addReg(registro);
            $("#ModalNew").modal('hide');
        });
        $('#BtnSendM').click(function() {
            let registro = getForm();
            updReg(registro);
            $("#ModalNew").modal('hide');
        });

        function cleanForm() {
            $('#Propietario').val('');
            $('#FechaInicio').val('');
            $('#Evento').val('');
            $('#TipoEvento').val('');
            $('#Responsable').val('');
            $('#Mascota').val('');
            $('#FechaFin').val('');
            $('#Observacion').val('');
            $('#EstadoEvento').val('');
            $('#Notificacion').val('');
            $('#Tipo').val('');   
        }

        function getForm() {
            let registro = {
                Propietario: $('#Propietario').val(),
                FechaInicio: $('#FechaInicio').val(),
                Evento: $('#Evento').val(),
                TipoEvento: $('#TipoEvento').val(),
                Mascota: $('#Mascota').val(),
                FechaFin: $('#FechaFin').val(),
                Observacion: $('#Observacion').val(),
                EstadoEvento: $('#EstadoEvento').val(),
                Notificacion: $('#Notificacion').val(),
                Responsable: $('#Responsable').val(),
                IdDb: $('#idDb').val(),
                Tipo: $('#Tipo').val(), 
            };
            return registro;
        }

        function addReg(reg) {
            $.ajax({
                type: 'POST',
                url: '/api/evento',
                data: reg,
                success: function(msg) {
                    window.location.replace('/evento');               
                },
                error: function(error) {
                    alert("Hay un problema:" + error);
                }
            });
        }

        function updReg(registro) {
            console.log(registro);
        $.ajax({
            type: 'POST',
            url: '/api/evento',
            data: registro,
            success: function(msg) {
                calendar.refetchEvents();
                window.location.replace('/evento');  
            },
            error: function(error) {
                alert("Hay un problema:" + error);
            }
        });
    }
    });
   
</script>
@endpush