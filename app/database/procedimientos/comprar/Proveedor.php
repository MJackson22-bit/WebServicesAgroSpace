<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Proveedor
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
     * Ejecuta un procedimiento almacenado y devuelve el resultado.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $provider = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-05-25 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodigoProv' => '0443',
                '@Tipo' => 'VencimientoxProveedorDetalle'
            ])
            ->ejecutar('dbo.usp_Compras_Proveedor')
            ->obtener();

        $this->respuesta($provider);

        return $this;
    }
}