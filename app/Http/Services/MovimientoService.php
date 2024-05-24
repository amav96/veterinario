<?php

namespace App\Http\Services;

use App\Models\Movimiento;

class MovimientoService {

    public function create(array $data){
        $this->validarCamposYDevolverError($data);
        $movimiento = new Movimiento();
        $movimiento->tipo_movimiento_id = $data['tipo_movimiento_id'];
        $movimiento->modulo = $data['modulo'];
        $movimiento->valor_nuevo = $this->obtenerDiferenciaValorNuevo($data['valor_anterior'], $data['valor_nuevo']);
        $movimiento->valor_anterior = $this->obtenerDiferenciaValorAnterior($data['valor_anterior'], $data['valor_nuevo']);
        $movimiento->usuario_id = $data['usuario_id'];
       
        $movimiento->save();

        return $movimiento;
    }

    private function validarCamposYDevolverError(array $data){
        $errores = [];
        if(!isset($data['modulo'])){
            throw new \Exception('El campo modulo es requerido');
         }
        if(!isset($data['tipo_movimiento_id'])){
           throw new \Exception('El campo tipo_movimiento_id es requerido');
        }
        if(!isset($data['valor_nuevo'])){
            throw new \Exception('El campo valor_nuevo es requerido');
        }
        if(!isset($data['usuario_id'])){
            throw new \Exception('El campo usuario_id es requerido');
        }
        return $errores;
    }

    private function obtenerDiferenciaValorAnterior($valorAnterior, $valorNuevo){
        $diferencias = [];
        $valorAnterior = json_decode($valorAnterior, true);
        $valorNuevo = json_decode($valorNuevo, true);
       
        foreach($valorAnterior as $key => $value){
            if($valorAnterior[$key] != $valorNuevo[$key]){
                $diferencias[$key] = $valorAnterior[$key];
            }
        }
        return json_encode($diferencias);
    }

    private function obtenerDiferenciaValorNuevo($valorAnterior, $valorNuevo){
        $diferencias = [];
        $valorAnterior = json_decode($valorAnterior, true);
        $valorNuevo = json_decode($valorNuevo, true);
        foreach($valorNuevo as $key => $value){
            
            if($valorAnterior[$key] != $valorNuevo[$key] && $key !== "updated_at"){
                $diferencias[$key] = $valorNuevo[$key];
            }
        }
        return json_encode($diferencias);
    }
}