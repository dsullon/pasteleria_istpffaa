<?php

namespace Controllers;

use App\Router;
use Models\Categoria;

class HomeController {
    public static function index(Router $router){
        $categorias = Categoria::all();
        $router->renderView('home/index', [
            'categorias' => $categorias
        ]);
    }

    public static function nosotros(Router $router) {
        $router->renderView('home/nosotros');
    }
}