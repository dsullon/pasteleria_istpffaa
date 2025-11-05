<?php

namespace Controllers;

use App\Router;

class ClienteController {

    public static function registro(Router $router){
        $router->renderView('clientes/registro');
    }
}