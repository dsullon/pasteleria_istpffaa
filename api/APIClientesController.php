<?php

namespace APIControllers;

use Classes\Email;
use Models\Usuario;

header('Content-Type: application/json');

class APIClientesController {

    public static function registrar(){
        $data = leerJson();
        $respuesta = respuestaAPI(500, mensaje: "No se ha podido registrar al usuario");
        $usuario = new Usuario($data);
        $errores = $usuario->validar();
        if(empty($errores)){
            // VALIDAR SI EL EMAIL EXISTE
            $usuarioExiste = Usuario::where(['email' => $usuario->email]);
            if(count($usuarioExiste) > 0){
                $respuesta = respuestaAPI(400, mensaje: "El email ya se encuentra registrado");
            } else {
                $passwordGenerado = generarStringAleatorio(6);
                $usuario->uid = md5(uniqid());
                $usuario->password = $passwordGenerado;
                $usuario->hashPassword();
                $usuario->token = md5(uniqid());
                $usuario->save();
                $email = new Email();
                $dataEmail = [
                    'email' => $usuario->email,
                    'nombres' => $usuario->nombres,
                    'token' => $usuario->token
                ];
                $email->confirmacionRegistro($dataEmail);

                $respuesta = respuestaAPI(201, estado: true, mensaje: "Usuario registrado");
            }
        } else {
            $respuesta = respuestaAPI(400, mensaje: "Los datos se encuentran incompletos", data: $errores);
        }
        echo json_encode($respuesta);
    }
}