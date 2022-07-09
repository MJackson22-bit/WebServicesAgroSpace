<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class PrevsEjec
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
     * > Obtiene los datos de la base de datos y los devuelve
     *
     * @return self Los datos se devuelven en formato JSON.
     */
    function get(): self
    {
        $approve = $this->connection
            ->parametros([
                '@FechaInicial' => '01-01-2016',
                '@FechaFinal' => '04-01-2017',
                '@Tipo' => "PresupuestovsEjecucion"
            ])
            ->ejecutar('dbo.usp_Dashboard_PrevsEjec')
            ->obtener();
        $this->respuesta($approve);
        return $this;
    }
}