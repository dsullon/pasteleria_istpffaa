<?php

require_once __DIR__ . '/../includes/app.php';

use App\Router;
use Controllers\CategoriaController;
use Controllers\HomeController;

$router = new Router();

// DEFINIR LAS RUTAS DE LA APLICACIÓN
$router->get('/', [HomeController::class, 'index']);
$router->get('/nosotros', [HomeController::class, 'nosotros']);
$router->get('/categorias', [CategoriaController::class, 'index']);

$router->validarRutas();