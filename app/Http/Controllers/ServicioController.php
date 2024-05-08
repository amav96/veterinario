<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Linea;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index',['servicios'=>$servicios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lineas = Linea::all();
        $categorias = Categoria::all(); 
        $subCategoria = SubCategoria::all(); 
        
        return view('servicios.create',[  'lineas'=>$lineas,
                                            'categorias'=>$categorias,
                                            'subCategorias'=>$subCategoria                                   
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'NombreServicio'=>'required|max:60',
        //     'email'=>'nullable|email'
        // ]);
        $ExoneradoImpuestos = false;
        if(null !== $request->input('ExoneradoImpuestos')){
            if($request->input('ExoneradoImpuestos')== "on"){
                $ExoneradoImpuestos = true;
            }
        }

        $servicio = new Servicio();
        $servicio->idLinea = $request->input('Linea');
        $servicio->idCategoria = $request->input('Categoria');
        $servicio->idSubCategoria = $request->input('SubCategoria');
        $servicio->Servicio = $request->input('NombreServicio');
        $servicio->CostoServicio = $request->input('CostoServicio');
        $servicio->PrecioServicio = $request->input('PrecioServicio');
        $servicio->ExoneradoImpuestos = $ExoneradoImpuestos;

        $servicio->save();
        return redirect()->route('servicio.index')->with('msg','Servicio Guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servicio = Servicio::find($id);
        $lineas = Linea::all();
        $categorias = Categoria::all(); 
        $subCategoria = SubCategoria::all(); 
 
        return view('servicios.edit',[  
                                            'servicio'=>$servicio,
                                            'lineas'=>$lineas,
                                            'categorias'=>$categorias,
                                            'subCategorias'=>$subCategoria                                   
                                        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'NombreServicio'=>'required|max:60',
        //     'email'=>'nullable|email'
        // ]);

        $ExoneradoImpuestos = false; 
        if(null !== $request->input('ExoneradoImpuestos')){
            if($request->input('ExoneradoImpuestos')== "on"){
                $ExoneradoImpuestos = true;
            }
        }
        $servicio = Servicio::find($id);
     
        $servicio->idLinea = $request->input('Linea');
        $servicio->idCategoria = $request->input('Categoria');
        $servicio->idSubCategoria = $request->input('SubCategoria');
        $servicio->Servicio = $request->input('NombreServicio');
        $servicio->CostoServicio = $request->input('CostoServicio');
        $servicio->PrecioServicio = $request->input('PrecioServicio');
        $servicio->ExoneradoImpuestos = $ExoneradoImpuestos;
        $servicio->save();

        return redirect()->route('servicio.index')->with('msg','Servicio Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }

    public function getCategorias($id)
    {
        $Categ = Linea::find($id);
        return  response()->json($Categ->getCategorias);
    }

    public function getSubCategorias($id)
    {
        $SubCateg = Categoria::find($id);
        return  response()->json($SubCateg->getSubCategorias);
    }
}
