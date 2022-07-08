<?php

namespace App\Database\Procedimientos\Campo;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class RubroFicha
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
                '@FechaInicial' => '2021-01-01 00:00:00',
                '@FechaFinal' => '2022-07-07 00:00:00',
                '@CodCiclo' => '018',
                '@CodRubro' => '00001',
                '@CodFinca' => '001',
                '@CodAct' => '001',
                '@Tipo' => 'CampoRubroFicha'
            ])
            ->ejecutar('dbo.usp_Campo_Rubro_Ficha')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}