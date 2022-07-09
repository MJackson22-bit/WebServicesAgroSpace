<?php

namespace App\Controladores;
use App\Configuraciones\MotorPlantilla;

class ControladorInicio
{
    private MotorPlantilla $motorPlantilla;

    public function __construct()
    {
        $this->motorPlantilla = new MotorPlantilla();
    }

    public function index(): void
    {
        $this->motorPlantilla
            ->renderizarPlantilla('inicio');
    }
}