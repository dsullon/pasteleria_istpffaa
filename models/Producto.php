<?php

namespace Models;

class Producto extends ActiveRecord{
    protected static $tabla = "productos";
    protected static $pk = "id";

    public $id;
    public $nombre;
    public $descripcion;
    public $categoria_id;
    public $precio;
    public $imagen;
    public $estado;
}