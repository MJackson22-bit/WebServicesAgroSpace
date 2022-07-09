<?php

namespace App\Controladores;

class ControladorInicio
{
    public function index(): void
    {
        echo require_once 'app/recursos/vistas/inicio.twig';
    }
}