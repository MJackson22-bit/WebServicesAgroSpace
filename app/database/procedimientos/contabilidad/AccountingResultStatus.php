<?php

namespace App\Database\Procedures\contabilidad;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class AccountingResultStatus
{
    use Convertidor;
    private Conexion $connection;

    /**
     * La función __construct() es una función constructora que crea una nueva instancia de la clase Conexion y la asigna
     * a la propiedad de conexión.
     */
    function __construct()
    {
        $this->connection = Conexion::getInstance();
    }

    /**
     * > Ejecuta un procedimiento almacenado y devuelve el resultado
     *
     * @return self La respuesta está siendo devuelta.
     */
    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2016 00:00:00',
                '@FechaFinal' => '06-06-2017 00:00:00',
                '@CodEmp' => '001',
                '@Cuenta' => '01-001-001-001-0001',
                '@Tipo' => "ContaEstadoResultado"
            ])
            ->exec('dbo.usp_Contabilidad_EstadoResultado')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}