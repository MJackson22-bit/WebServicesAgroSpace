<?php

namespace App\Database\Procedimientos\Campo;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class Pivote
{
    use Convertidor;

    private Conexion $conexion;

    function __construct()
    {
        $this->conexion = Conexion::obtenerInstancia();
    }
    function obtener(): self
    {
        $resultado = $this->conexion
            ->parameters([
                '@FechaInicial' => '2021-01-01 00:00:00',
                '@FechaFinal' => '2022-07-07 00:00:00',
                '@Tipo' => 'Campo'
            ])
            ->exec('dbo.usp_Campo_Pivote')
            ->fetch();

        $this->respuesta($resultado);

        return $this;
    }
}