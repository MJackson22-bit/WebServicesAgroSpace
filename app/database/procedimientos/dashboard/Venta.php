<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Venta
{
    use Convertidor;
    private Conexion $connection;

    /**
     * Crea una nueva instancia de la clase Conexión y la asigna a la propiedad $conexión
     */
    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    /**
     * Una función que devuelve un objeto propio.
     *
     * @return self El resultado de la consulta
     */
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