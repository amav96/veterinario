<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\TipoEvento;
use App\Models\EstadoEvento;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $cliente = Cliente::all();
        $tiposEvento = TipoEvento::all();
        $estadoEvento = EstadoEvento::all();
        $notidicacionEvento = Notificacion::all();
        $usuarios = User::all();
        $eventos = Evento::all();   
        $allEventos = [];
        $oneEventos = [];
        foreach($eventos  as $evento){
            $allEventos[] = [
                'idDb' => $evento->id,
                'idCliente' => $evento->getCliente->Nombre.' '.$evento->getCliente->Apellido,
                'idMascota' => $evento->getMascota->Mascota,
                'idTipoEvento' => $evento->idTipoEvento,
                'idEstadoEvento' => $evento->idEstadoEvento,
                'idUsuario' => $evento->idUsuario,
                'idNotificacion' => $evento->idNotificacion,
                'Observacion' => $evento->Observacion,
                'title'=> $evento->Evento,
                'start'=> $evento->FechaInicio,
                'end'=> $evento->FechaFin,
            ];
        }

  	    return view('eventos.index',['allEventos'=>$allEventos, 'clientes'=>$cliente,
                                    'tiposEvento'=>$tiposEvento,'estadoEvento'=>$estadoEvento,
                                    'notificacion'=>$notidicacionEvento, 'users'=>$usuarios]);      
    }

    public function list()
    {
        $eventos = Evento::all();
        return view('eventos.list',['eventos'=>$eventos]);
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
    public function action(Request $request)
    {
       if($request->input('Tipo') == '1')
       {     
            $event = new Evento;
            $event->idCliente = $request->input('Propietario');
            $event->idMascota = $request->input('Mascota');
            $event->idTipoEvento = $request->input('TipoEvento');
            $event->idEstadoEvento = $request->input('EstadoEvento');
            $event->idUsuario = $request->input('Responsable');
            $event->idNotificacion = $request->input('Notificacion');
            $event->Evento = $request->input('Evento');
            $event->FechaInicio = $request->input('FechaInicio');
            $event->FechaFin = $request->input('FechaFin');
            $event->Observacion = $request->input('Observacion');
            $event->save();
            return response()->json($event);
        }elseif ($request->input('Tipo') == '2'){
            $event = Evento::find($request->input('IdDb'));
            $event->idTipoEvento = $request->input('TipoEvento');
            $event->idEstadoEvento = $request->input('EstadoEvento');
            $event->idUsuario = $request->input('Responsable');
            $event->idNotificacion = $request->input('Notificacion');
            $event->Evento = $request->input('Evento');
            $event->FechaInicio = $request->input('FechaInicio');
            $event->FechaFin = $request->input('FechaFin');
            $event->Observacion = $request->input('Observacion');
            $event->save();
            return response()->json($event);
        }
    }
    
}
