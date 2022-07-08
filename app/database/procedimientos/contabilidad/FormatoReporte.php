<?php

namespace App\Database\Procedimientos\Contabilidad;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class FormatoReporte
{
    use Convertidor;
    private Conexion $connection;

    /**
     * La función __construct() es una función constructora que crea una nueva instancia de la clase Conexion y la asigna
     * a la propiedad de conexión.
     */
    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    /**
     * Ejecuta un procedimiento almacenado y devuelve el resultado.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@FechaInicial' => '01-01-2017',
                '@FechaFinal' => '01-01-2018',
                '@CodRpt' => 1,
                '@Moneda' => 'COR',
                '@Tipo' => 'Saldo'
            ])
            ->ejecutar('dbo.usp_Contabilidad_FormatoReporte')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}