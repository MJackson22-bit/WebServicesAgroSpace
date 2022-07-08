<?php

namespace App\Database\Procedimientos\Contabilidad;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class EstadoResultado
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
     * > Ejecuta un procedimiento almacenado y devuelve el resultado
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@FechaInicial' => '01-01-2016 00:00:00',
                '@FechaFinal' => '06-06-2017 00:00:00',
                '@CodEmp' => '001',
                '@Cuenta' => '01-001-001-001-0001',
                '@Tipo' => "ContaEstadoResultado"
            ])
            ->ejecutar('dbo.usp_Contabilidad_EstadoResultado')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}