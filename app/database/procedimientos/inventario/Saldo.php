<?php

namespace App\Database\Procedimientos\Inventario;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Saldo
{
    use Convertidor;

    private Conexion $connection;

    /**
     * Crea una nueva instancia de la clase Conexión y la asigna a la propiedad $conexión
     */
    function __construct()
    {
        $this->connection = Conexion::getInstance();
    }

    /**
     * > Ejecuta un procedimiento almacenado y devuelve el resultado
     *
     * @return self El resultado de la consulta.
     */
    function get(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00'
            ])
            ->ejecutar('dbo.usp_Inventario_Saldos')
            ->obtener();

        $this->respuesta($resultado);
        return $this;
    }
}