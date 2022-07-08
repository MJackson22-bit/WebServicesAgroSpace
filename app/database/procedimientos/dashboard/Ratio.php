<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Ratio
{
    use Convertidor;
    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    function get(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@CodArt' => '00085',
                '@CodRubro' => '00002',
                '@CodAct' => '001',
                '@CodSAct' => '0077',
                '@Tipo' => "RatiosxCiclosDinamico"
            ])
            ->ejecutar('dbo.usp_Dashboard_Ratios')
            ->obtener();
        $this->respuesta($resultado);
        return $this;
    }
}