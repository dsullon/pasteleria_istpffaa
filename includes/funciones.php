<?php

function depurar($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}

function leerJson() : array {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);   
    return $data ?? []; 
}

function respuestaAPI(int $httpCode, bool $estado = false, string $mensaje = "", mixed $data = []) : array {
    http_response_code($httpCode);
    $respuesta = [
        'estado' => $estado,
        'mensaje' => $mensaje,
        'data' => $data        
    ];
    return $respuesta;
}

function generarStringAleatorio($longitud = 10) : string {
    $stringAleatorio = '';
    $caracteres = "0123456789abcdefghijklmnopqrstuvwyzABCDEFGHIJQLMNOPQRSTUVWXYZ";
    $longitudCaracteres = strlen($caracteres);
    for ($i=0; $i < $longitud; $i++) {
        $stringAleatorio .= $caracteres[random_int(0, $longitudCaracteres -1)];
    }
    return $stringAleatorio;
}

