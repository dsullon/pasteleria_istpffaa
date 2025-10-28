<?php

namespace Controllers;

use App\Router;
use Models\Categoria;

class CategoriaController {
    public static function index(Router $router) {

        $categorias = Categoria::all();

        $router->renderView('categorias/index', [
            'categorias' => $categorias
        ]);
    }
}