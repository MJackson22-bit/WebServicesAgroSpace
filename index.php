<?php

// Require the autoload file
require_once 'vendor/autoload.php';

use Dotenv\Dotenv;
use App\Enrutador\Rutas;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

new Rutas();