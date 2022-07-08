<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Tipo
{
    use Convertidor;

    private Conexion $conexion;

    function __construct()
    {
        $this->conexion = Conexion::obtenerInstancia();
    }

    function get(): self
    {
        $resultado = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Tipo' => 'Top5Tipo'
            ])
            ->ejecutar('dbo.usp_Compras_Tipo')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}