<?php

// Requerimos el archivo de autoload
require_once 'vendor/autoload.php';

use Dotenv\Dotenv;
use App\Enrutador\Rutas;

// Cargamos las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Iniciamos el enrutador
Rutas::obtenerInstancia();