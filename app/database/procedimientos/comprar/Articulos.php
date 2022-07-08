<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Articulos
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
     * Obtiene datos de una base de datos.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $resultado = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodigoArt' => '03537',
                '@Tipo' => 'CompraProveedorxArticulo'
            ])
            ->ejecutar('dbo.usp_Compras_Articulo')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}