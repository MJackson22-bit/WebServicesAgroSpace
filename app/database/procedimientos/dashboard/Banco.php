<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Banco
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
     * > Ejecuta un procedimiento almacenado llamado `usp_Dashboard_Banco` con los parámetros `@FechaInicial`,
     * `@FechaFinal` y `@Tipo` y devuelve el resultado
     *
     * @return self La respuesta de la consulta.
     */
    function get(): self
    {
        $respuesta = $this->connection
            ->parametros([
                '@FechaInicial' => '01-1-2012 00:00:00',
                '@FechaFinal' => '01-1-2017 00:00:00',
                '@Tipo' => 'Disponibilidad'
            ])
            ->ejecutar('dbo.usp_Dashboard_Banco')
            ->obtener();
        $this->respuesta($respuesta);
        return $this;
    }
}