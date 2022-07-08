<?php

namespace App\Database\Procedures\Accounts;
use App\Database\Connection;
use App\Utils\ToResponse;

class Payable
{
    use ToResponse;

    private Connection $connection;

    /**
     * La función __construct() es una función constructora que crea una nueva instancia de la clase Connection y la asigna
     * a la propiedad de conexión.
     */
    function __construct()
    {
        $this->connection = Connection::getInstance();
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
                '@FechaInicial' => '05-11-2016 00:00:00',
                '@FechaFinal' => '05-11-2018 00:00:00',
                '@CodEmp' => '001',
                '@CodProv' => '0001',
                '@Tipo' => "CxPPagos"
            ])
            ->exec('dbo.usp_CuentasxPagar_EstadoCuenta')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}