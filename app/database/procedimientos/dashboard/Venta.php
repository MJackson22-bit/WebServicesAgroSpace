<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Venta
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
                '@FechaInicial' => '01-28-2020',
                '@FechaFinal' => '07-07-2022',
                '@Tipo' => "EstadoVentasTotales"
            ])
            ->ejecutar('dbo.usp_Dashboard_Ventas')
            ->obtener();
        $this->respuesta($resultado);
        return $this;
    }
}