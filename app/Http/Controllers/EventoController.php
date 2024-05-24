<?php

namespace App\Http\Controllers;

use App\Http\Requests\Evento\SaveEventoRequest;
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
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveEventoRequest $request)
    {

        $evento = new Evento;
        $evento->idCliente = $request->input('idCliente');
        $evento->idUsuario = $request->input('idUsuario');
        $evento->idNotificacion = $request->input('idNotificacion');
        $evento->Evento = $request->input('Evento');
        $evento->idTipoEvento = $request->input('TipoEvento');
        $evento->idEstadoEvento = $request->input('EstadoEvento');
        $evento->FechaInicio = $request->input('FechaInicio');
        $evento->FechaFin = $request->input('FechaFin');
        $evento->Observacion = $request->input('Observacion');
        $evento->idMascota = $request->input('Mascota');
        $evento->save();

        return response()->json($evento, 200);
       
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
    public function update(SaveEventoRequest $request, int $id)
    {
       
        $evento = Evento::find($id);
        if(!$evento){
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        $evento->idCliente = $request->input('idCliente') ?? $evento->idCliente;
        $evento->idUsuario = $request->input('idUsuario') ?? $evento->idUsuario;
        $evento->idNotificacion = $request->input('idNotificacion') ?? $evento->idNotificacion;
        $evento->Evento = $request->input('Evento') ?? $evento->Evento;
        $evento->idTipoEvento = $request->input('TipoEvento') ?? $evento->idTipoEvento;
        $evento->idEstadoEvento = $request->input('EstadoEvento') ?? $evento->idEstadoEvento;
        $evento->FechaInicio = $request->input('FechaInicio') ?? $evento->FechaInicio;
        $evento->FechaFin = $request->input('FechaFin') ??  $evento->FechaFin;
        $evento->Observacion = $request->input('Observacion') ?? $evento->Observacion;
        $evento->idMascota = $request->input('Mascota') ?? $evento->idMascota;
        $evento->save();
       

        return response()->json($evento, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
  
    
}
