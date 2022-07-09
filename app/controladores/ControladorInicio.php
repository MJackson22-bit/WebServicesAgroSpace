<?php

namespace App\Controladores;

class ControladorInicio
{
    public function __construct()
    {

    }

    public function index(): void
    {
        echo require_once 'app/recursos/vistas/inicio.php';
    }
}