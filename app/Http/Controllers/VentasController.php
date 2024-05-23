<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\VentaItem;
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
        $ventas = Venta::with(['cliente', 'cliente.getMascotas', 'items'])->get();

        return view('ventas.index', ['ventas' => $ventas]);
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
        // Datos de la venta
        // Modelo de venta

        $datos = $request->all();
        $venta = new Venta();
        $venta_items = new VentaItem();

        // Guardar venta (devolver venta_id)

        $venta->cliente_id      = $datos['cliente_id'];
        $venta->subtotal        = 0;
        $venta->impuestos       = 0;
        $venta->total           = 0;
        $venta->medio_pago_id   = null;
        $venta->facturada       = null;
        $venta->notificada      = null;

        $venta->save();

        $venta_id               = $venta->id;

        // Subtotales, impuestos y totales

        $subtotal               = 0.0;
        $impuestos              = 0.0;
        $total                  = 0.0;

        // Calcular subtotales, impuestos y totales

        foreach ($datos['item'] as $tipo => $items) {
            $datos_item = [];

            foreach ($items as $item) {
                $item = (object) $item;

                $datos_item['venta_id'] = $venta_id;

                if ($tipo == 'producto') {
                    $datos_item['producto_id'] = $item->id;
                }

                if ($tipo == 'servicio') {
                    $datos_item['servicio_id'] = $item->id;
                }

                $datos_item['mascota_id'] = $item->mascota_id;
                $datos_item['subtotal'] = $item->subtotal;
                $datos_item['impuestos'] = $item->impuestos;
                $datos_item['cantidad'] = $item->cantidad;
                $datos_item['total'] = $item->total;
                $datos_item['created_at'] = now();

                $subtotal += $datos_item['subtotal'];
                $impuestos += $datos_item['impuestos'];
                $total += $datos_item['total'];

                $venta_items->insert($datos_item);
            }
        }

        // Actualizar subtotal, impuestos y total de la venta

        $venta->subtotal = $subtotal;
        $venta->impuestos = $impuestos;
        $venta->total = $total;

        $venta->save();

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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->back()->with('msg', 'Venta eliminada correctamente.');
    }
}
