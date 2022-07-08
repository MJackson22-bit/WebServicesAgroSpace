<?php

namespace App\Database\Procedures\Accounting;
use App\Database\Connection;
use App\Utils\ToResponse;

class AccountingGeneralBalance
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
     * Una función que devuelve un objeto propio.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2017 00:00:00',
                '@FechaFinal' => '06-06-2017 00:00:00',
                '@CodEmp' => '001',
                '@Cuenta' => '01-001-001-001-0001',
                '@Tipo' => "ContaBalanzaGeneralMov"
            ])
            ->exec('dbo.usp_Contabilidad_BalanzaCuenta')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}