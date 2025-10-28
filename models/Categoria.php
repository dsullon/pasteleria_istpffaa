<?php

namespace Models;

class Categoria extends ActiveRecord {
    protected static $tabla = "categorias_producto";
    protected static $pk = "id";

    public $id;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $estado;
}