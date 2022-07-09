<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Ratio
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
     * @return self El resultado de la consulta.
     */
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