<?php

namespace App\Http\Controllers;

use App\Models\VentaItem;
use Illuminate\Http\Request;

class HistorialComprasController extends Controller
{
    public function findAll(Request $request){
        if(!$request->mascota_id){
            return response()->json("No se han encontrado", 404);
        }

        $parametros = $request->all();
        $query = VentaItem::query();

        $compras = $query->with([
                        'producto',
                        'servicio',
                        'mascota'
                    ])
                    ->when(isset($parametros["nombre"]), function($query) use ($parametros){
                        $query->whereHas('producto', function($query) use ($parametros){
                            $query->where('Producto', 'like', '%'.$parametros["nombre"].'%');
                        })->orWhereHas('servicio', function($query) use ($parametros){
                            $query->where('Servicio', 'like', '%'.$parametros["nombre"].'%');
                        });
                    })
                    ->where("mascota_id", $parametros["mascota_id"])->get();


        return response()->json($compras);
        
    }
}
