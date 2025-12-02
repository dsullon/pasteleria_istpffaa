<?php

namespace Models;

use Exception;
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
     * Crea o actualiza un registro
     */
    public function save(){
        $resultado = false;
        $propiedades = get_object_vars($this);
        if(!isset($propiedades[static::$pk]))
            $resultado = $this->crear($propiedades);
        else
            $resultado = $this->actualizar($propiedades);
        return $resultado;
    }

    /**
     * Busca regitros en base a una condición o criterio
     */

    public static function where(array $filters){
        if(count($filters) == 0){
            throw new Exception("No se ha ingresado los criterios a filtrar");
        }
        $params=[];
        $query = "SELECT * FROM " . static::$tabla . " WHERE ";
        foreach ($filters as $key => $value) {
            $criterias[] = "{$key}  = :{$key}";
            $params[":{$key}"] = $value;
        }
        $query .= implode(" AND ", $criterias);

        $stmt = self::$db->prepare($query);
        $stmt->execute($params);
        $datos = [];
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
            $datos[] = self::crearObjeto($fila);
        }
        return $datos;
    }

    private function crear($propiedades) {
        $columnas = [];
        foreach ($propiedades as $key => $value) {
            if($value && $key !== static::$pk){
                $columnas[] = $key;
                $places[] = ":$key";
                $params[":$key"] = $value;
            }
        }
        $query = "INSERT INTO " . static::$tabla . "(" . implode(", ", $columnas) . ") VALUES(". implode(", ", $places) .")";
        $stmt = self::$db->prepare($query);
        $resultado = $stmt->execute($params);
        $this->{static::$pk} = self::$db->lastInsertId();
        return $resultado;
    }

    private function actualizar($propiedades) {
        
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
