<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class NoRecibidas
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
     * > Ejecuta un procedimiento almacenado y devuelve el resultado
     *
     * @return self La consulta devuelve una lista de productos que no se han recibido.
     */
    function obtener(): self
    {
        $respuesta = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodCompra' => '010833',
                '@Tipo' => 'CompraNoRecibxFamilia'
            ])
            ->ejecutar('dbo.usp_Compras_NoRecibidas')
            ->obtener();

        $this->respuesta($respuesta);

        return $this;
    }
}