<?php

namespace Controllers;

use App\Router;
use Models\Producto;

class ProductoController {
    public static function index(Router $router) {
        $listadoProductos = Producto::all();
        $router->renderView('productos/index', [
            'productos' => $listadoProductos
        ]);
    }
}