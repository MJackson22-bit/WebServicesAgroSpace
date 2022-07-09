<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Rubro
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
     * @return self La respuesta de la consulta.
     */
    function get(): self
    {
        $respuesta = $this->connection
            ->parametros([
                '@Ciclo' => '001',
                '@Tipo' => 'ListadoRubrosxCicloOLD'
            ])
            ->ejecutar('dbo.usp_Dashboard_RubroxCiclo')
            ->obtener();
        $this->respuesta($respuesta);
        return $this;
    }
}