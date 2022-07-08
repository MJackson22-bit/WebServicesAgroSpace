<?php
namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;
class Inventario
{
    use Convertidor;
    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    function get(): self
    {
        $respuesta = $this->connection
            ->parametros([
                '@FechaInicial' => '04-15-2020',
                '@FechaFinal' => '07-07-2022',
                '@Tipo' => "InvVolumenConsumo"
            ])
            ->ejecutar('dbo.usp_Dashboard_Inventario')
            ->obtener();
        $this->respuesta($respuesta);
        return $this;
    }
}