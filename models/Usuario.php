<?php

namespace Models;

class Usuario extends ActiveRecord {

    protected static $tabla = "usuarios";
    protected static $pk = "id";

    public $id;
    public $uid;
    public $nombres;
    public $direccion;
    public $telefono;
    public $email;
    public $password;
    public $tipo;
    public $confirmado;
    public $token;
    public $estado;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->uid = $args['uid'] ?? null;
        $this->nombres = $args['nombres'] ?? null;
        $this->direccion = $args['direccion'] ?? null;
        $this->telefono = $args['telefono'] ?? null;
        $this->email = $args['email'] ?? null;
        $this->password = $args['password'] ?? null;
        $this->tipo = $args['tipo'] ?? 2;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? null;
        $this->estado = $args['estado'] ?? 1;
    }

    public function validar() : array {
        $errores = [];
        if(!$this->nombres)
            $errores[] = "El nombre es obligatorio";

        if(!$this->direccion)
            $errores[] = "La dirección es obligatoria";

        if(!$this->telefono)
            $errores[] = "El teléfono es obligatorio";

        if(!$this->email)
            $errores[] = "El email es obligatorio";

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            $errores[] = "El email ingresado no es válido";
        
        return $errores;
    }

    function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
}