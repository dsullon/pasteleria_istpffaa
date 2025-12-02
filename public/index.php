<?php

require_once __DIR__ . '/../includes/app.php';

use APIControllers\APIClientesController;
use App\Router;
use Controllers\CategoriaController;
use Controllers\ClienteController;
use Controllers\HomeController;
use Controllers\ProductoController;

$router = new Router();

// API
$router->post('/api/clientes', [APIClientesController::class, 'registrar']);

// DEFINIR LAS RUTAS DE LA APLICACIÓN
$router->get('/', [HomeController::class, 'index']);
$router->get('/nosotros', [HomeController::class, 'nosotros']);
$router->get('/categorias', [CategoriaController::class, 'index']);
$router->get('/productos', [ProductoController::class, 'index']);
$router->get('/registro', [ClienteController::class, 'registro']);

$router->validarRutas();