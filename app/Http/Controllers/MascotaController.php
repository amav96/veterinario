<?php

namespace App\Http\Controllers;

use App\Http\Services\MovimientoService;
use App\Models\Mascota;
use App\Models\Especie;
use App\Models\Raza;
use App\Models\Cliente;
use App\Models\Diagnostico;
use App\Models\ExamenAuxiliar;
use App\Models\HistoriaClinica;
use App\Models\Producto;
use App\Models\TipoHistoriaClinica;
use App\Models\TipoMovimiento;
use Illuminate\Http\Request; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascota::all();
        $clientes = Cliente::all(); 
        return view('mascotas.index',['mascotas'=>$mascotas,'clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especies = Especie::all();
        $razas = Raza::all(); 
        $clientes = Cliente::all(); 

        return view('mascotas.create',[  
                                        'especies'=>$especies,
                                        'razas '=>$razas,
                                        'clientes'=>$clientes
                                    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $esterilizado = false;
        // if(null !== $request->input('Esterilizado')){
        //     if($request->input('Esterilizado')== "on"){
        //         $esterilizado = true;
        //     }
        // }

        // $asegurado = false;
        // if(null !== $request->input('Asegurado')){
        //     if($request->input('Asegurado')== "on"){
        //         $asegurado = true;
        //     }
        // } 

        $mascota = new Mascota();
        $mascota->idCliente = $request->input('Propietario') ;
        $mascota->idEspecie = $request->input('Especie');
        $mascota->idRaza = $request->input('Raza');
        $mascota->idFrecuencia = $request->input('Frecuencia') ;
        $mascota->idDiaPreferido = $request->input('DiaPreferido');
        $mascota->NumeroHistoria = $request->input('NumeroHistoria');
        $mascota->Mascota = $request->input('NombreMascota');
        $mascota->FechaNacimiento = Carbon::createFromFormat('d/m/Y', $request->input('FechaNacimiento'));
        $mascota->Microchip = $request->input('NumeroMicrochip');
        $mascota->Sexo = $request->input('Sexo');
        $mascota->Esterilizado = $request->input('Esterilizado');
        $mascota->Asegurado = $request->input('Asegurado');
        $mascota->Notas = $request->input('Notas');
        $mascota->Grooming = $request->input('Grooming');
        
        $mascota->save();

        $movimiento = new MovimientoService();
        $movimiento->create([
            'tipo_movimiento_id' => TipoMovimiento::MASCOTA_CREACION,
            'valor_anterior' => null,
            'valor_nuevo' => json_encode($mascota),
            'modulo' => TipoMovimiento::MASCOTA,
            'usuario_id' => $request->user()->id
        ]);

        return redirect()->route('mascota.index')->with('msg','Mascota Guardada correctamente.');
    }

    /**
     * Display the specified resource.
    */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mascotas = Mascota::find($id);
        $especies = Especie::all();
        $razas = Raza::all(); 
        $clientes = Cliente::all(); 
        //dd($mascotas);
        return view('mascotas.edit',[ 
                                        'mascota' =>$mascotas,
                                        'especies'=>$especies,
                                        'razas '=>$razas,
                                        'clientes'=>$clientes
                                    ]);
    }

    public function historialClinico($id)
    {
        $mascota = Mascota::find($id);
        $historiasClinicas =  HistoriaClinica::where("idMascota", $id)
                                ->with([
                                    'tipoHistoriaClinica'
                                ])
                                ->get();
        return view('mascotas.historialClinico',[
            'mascota'                   => $mascota,
            'tiposHistoriasClinicas'    => TipoHistoriaClinica::all(),
            'diagnosticos'              => Diagnostico::all(),
            'examenesAuxiliares'        => ExamenAuxiliar::all(),
            'productos'                 => Producto::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $esterilizado = false;
        // if(null !== $request->input('Esterilizado')){
        //     if($request->input('Esterilizado')== "on"){
        //         $esterilizado = true;
        //     }
        // }

        // $asegurado = false;
        // if(null !== $request->input('Asegurado')){
        //     if($request->input('Asegurado')== "on"){
        //         $asegurado = true;
        //     }
        // }

        $mascota = Mascota::find($id);
        $valorAnterior = json_encode($mascota);

        $mascota->idCliente = $request->input('Propietario') ;
        $mascota->idEspecie = $request->input('Especie');
        $mascota->idRaza = $request->input('Raza');
        $mascota->idFrecuencia = $request->input('Frecuencia') ;
        $mascota->idDiaPreferido = $request->input('DiaPreferido');
        $mascota->NumeroHistoria = $request->input('NumeroHistoria');
        $mascota->Mascota = $request->input('NombreMascota');
        $mascota->FechaNacimiento = Carbon::createFromFormat('d/m/Y', $request->input('FechaNacimiento'));;
        $mascota->Microchip = $request->input('NumeroMicrochip');
        $mascota->Sexo = $request->input('Sexo');
        $mascota->Esterilizado = $request->input('Esterilizado');
        $mascota->Asegurado = $request->input('Asegurado');
        $mascota->Notas = $request->input('Notas');
        $mascota->Grooming = $request->input('Grooming');
        
        $mascota->save();

        $movimiento = new MovimientoService();
        $movimiento->create([
            'tipo_movimiento_id' => TipoMovimiento::MASCOTA_EDICION,
            'valor_anterior' => $valorAnterior,
            'valor_nuevo' => json_encode($mascota),
            'modulo' => TipoMovimiento::MASCOTA,
            'usuario_id' => $request->user()->id
        ]);

        return redirect()->route('mascota.index')->with('msg','Mascota Modificada correctamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        //
    }

    public function getRazas($id)
    {
        $Especie = Especie::find($id);
        return  response()->json($Especie->getRazas);
    }

    public function  getGrafico(){
        $result = Mascota::select('especies.Especie As Mes', DB::raw('count(*) as Total'))
        ->join('especies', 'especies.id', '=', 'mascotas.idEspecie')                
        ->groupby('Mes')
                        ->get();
        return view('mascotas.graphics',['result'=>$result]);

    }

    public function getMascotas($id)
    {
        $cliente = Cliente::find($id);

        return  response()->json($cliente->getMascotas);
    }
}
