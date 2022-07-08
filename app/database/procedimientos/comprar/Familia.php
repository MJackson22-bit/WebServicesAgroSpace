<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Familia
{
    use Convertidor;

    private Conexion $conexion;

    /**
     * La función __construct() es una función constructora que crea una nueva instancia de la clase Conexion y la asigna
     * a la propiedad de conexión.
     */
    function __construct()
    {
        $this->conexion = Conexion::obtenerInstancia();
    }

    /**
     * > Obtiene datos de un procedimiento almacenado y los devuelve como respuesta
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $respuesta = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Tipo' => 'Top10Familia'
            ])
            ->ejecutar('dbo.usp_Compras_Familia')
            ->obtener();

        $this->respuesta($respuesta);

        return $this;
    }
}