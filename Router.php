<?php

namespace App;

class Router {
    public array $getRoutes = [];  // Rutas de tipo GET
    public array $postRoutes = []; // Rutas de tipo POST

    // Asignar rutas de tipo GET
    public function get($url, $func) {
        $this->getRoutes[$url] = $func;
    }

    // Asignar rutas de tipo POST
    public function post($url, $func){
        $this->postRoutes[$url] = $func;
    }

    //Validar si la ruta existe
    public function validarRutas() {
        //Ruta Actual
        $rutaActual = $_SERVER['REQUEST_URI'] ?? '/';
        // Método de la solicitud
        $metodoSolicitud = $_SERVER['REQUEST_METHOD'];

        if($metodoSolicitud === "GET"){
            $func = $this->getRoutes[$rutaActual] ?? null;
        } else {
            $func = $this->postRoutes[$rutaActual] ?? null;
        }

        if($func){
            call_user_func($func, $this);
        } else {
            echo "La ruta solicitada no existe";
        }
    }

    public function renderView($vista, $datos = []) {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        
        // Almacenar vista en forma temporal
        ob_start();
        include_once __DIR__ . "/views/$vista.php";
        $contenidoVista = ob_get_clean();
        include_once __DIR__ . "/views/layout.php";
    }
}