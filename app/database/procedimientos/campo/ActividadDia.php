<?php

namespace App\Database\Procedimientos\Campo;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class ActividadDia
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
            ->parametros([
                '@FechaInicial' => '2015-01-07 00:00:00',
                '@FechaFinal' => '2016-06-30 00:00:00',
                '@CodCiclo' => '001',
                '@CodAct' => '002',
                '@Tipo' => 'CampoActividadDia'
            ])
            ->ejecutar('dbo.usp_Campo_Actividad_Dia')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}