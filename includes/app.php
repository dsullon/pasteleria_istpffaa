<?php

use Models\ActiveRecord;

require_once __DIR__ . '/../vendor/autoload.php';

/* CARGAR LAS VARIABLES DE ENTORNO */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require_once 'database.php';
// Llamar a funciones.php
require_once 'funciones.php';

ActiveRecord::setDB($db);