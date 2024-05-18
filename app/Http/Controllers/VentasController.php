<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Producto;
use App\Models\Servicio;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index',['ventas'=>$ventas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes   = Cliente::all();
        $mascotas   = Mascota::all();
        $productos  = Producto::all();
        $servicios  = Servicio::all();

        // Items (combinación de productos y servicios)

        $items      = $productos->concat($servicios);

        return view('ventas.create', ['clientes' => $clientes, 'mascotas' => $mascotas, 'items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        dd($datos);

        return redirect()->route('ventas.index')->with('msg', 'Venta creada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clientes = Cliente::find($id);
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();
        return view('clientes.edit',[
                                            'cliente'=>$clientes,
                                            'departamentos'=>$departamentos,
                                            'provincias'=>$provincias,
                                            'distritos'=>$distritos
                                        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        /*$request->validate([
            'NombrePrveedor'=>'required|max:3',
            'email'=>'nullable|email'
        ]);*/
        $ClienteReferido = false;
        if(null !== $request->input('ClienteReferido')){
            if($request->input('ClienteReferido')== "on"){
                $ClienteReferido = true;
            }
        }
        $cliente = Cliente::find($id);
        $cliente->idDepartamento = $request->input('Departamento');
        $cliente->idProvincia = $request->input('Provincia');
        $cliente->idDistrito = $request->input('Distrito');
        $cliente->Nombre = $request->input('Nombre');
        $cliente->Apellido = $request->input('Apellido');
        $cliente->DocumentoIdentidad = $request->input('DocumentoIdentidad');
        $cliente->FechaNacimiento = Carbon::createFromFormat('d/m/Y', $request->input('FechaNacimiento'));
        $cliente->Email = $request->input('Email');
        $cliente->TelefonoFijo = $request->input('TelefonoFijo');
        $cliente->TelefonoMovil = $request->input('TelefonoMovil');
        $cliente->TelefonoTrabajo = $request->input('TelefonoTrabajo');
        $cliente->Direccion = $request->input('Direccion');
        $cliente->ClienteReferido = $ClienteReferido;
        $cliente->Observaciones = $request->input('Observaciones');
        $cliente->NombreEmpresa = $request->input('NombreEmpresa');
        $cliente->RegistroTributario = $request->input('RegistroTributario');
        $cliente->DireccionEmpresa = $request->input('DireccionEmpresa');
        $cliente->Facebook = $request->input('Facebook');
        $cliente->Instagram = $request->input('Instagram');
        //$cliente->ZonaResidencia = $request->input('ZonaResidencia');
        $cliente->ReferenciaDireccion = $request->input('ReferenciaDireccion');

        $cliente->save();
        return redirect()->route('cliente.index')->with('msg','Cliente Modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }


    public function getProvincias($id)
    {
        $depto = Departamento::find($id);
        return  response()->json($depto->getProvincias);
    }

    public function getDistritos($id)
    {
        $prov = Provincia::find($id);
        return  response()->json($prov->getDistritos);
    }

    public function  getGrafico(){
        $result = Cliente::select('created_at', DB::raw('count(*) as Total'), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as Mes"))
                        ->groupby('Mes')
                        ->get();

        return view('clientes.graphics',['result'=>$result]);

    }

}
