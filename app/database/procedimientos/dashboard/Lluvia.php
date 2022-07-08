<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Lluvia
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
                '@FechaInicial' => '01-01-2016',
                '@FechaFinal' => '06-01-2016',
                '@Finca' => 'HORMIGUERO',
                '@Tipo' => "VolumenLluvia"
            ])
            ->ejecutar('dbo.usp_Dashboard_Lluvia')
            ->obtener();
        $this->respuesta($resultado);
        return $this;
    }
}