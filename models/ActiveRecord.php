<?php

namespace Models;

use PDO;

abstract class ActiveRecord {
    protected static $db;
    protected static $tabla;
    protected static $pk;

    public static function setDB($baseDatos){
        self::$db = $baseDatos;
    }

    public static function getDB() {
        return self::$db;        
    }

    //PDO

    /**
     * Buscar un registro por su ID
     */
    public static function find(int $id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE " . static::$pk . "= :id LIMIT 1";
        $stmt = self::$db->prepare($query);
        $stmt->execute([":id" => $id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $resultado = self::crearObjeto($resultado);
        return $resultado;
    }

    /**
     * Lista todos los registros de la base de datos
     */
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $stmt = self::$db->prepare($query);
        $stmt->execute();
        $resultado = [];
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
            $resultado[] = self::crearObjeto($fila);
        }
        return $resultado;
    }

    /**
     * Crear un objeto a partir de un arreglo asociativo
     */
    private static function crearObjeto($registro){
        $nuevObjeto = new static;
        foreach($registro as $clave => $valor){
            if(property_exists($nuevObjeto, $clave)){
                $nuevObjeto->$clave = $valor;
            }
        }        
        return $nuevObjeto;
    }
}
