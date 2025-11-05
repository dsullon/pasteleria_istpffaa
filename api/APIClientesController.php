<?php

namespace APIControllers;

class APIClientesController {
    public static function registrar(){
        return json_encode([
            'mensaje' => "Datos registrados"
        ]);
    }
}