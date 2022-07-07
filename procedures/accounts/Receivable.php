<?php

namespace Procedures\Accounts;
use App\Database\Connection;
use App\Utils\ToResponse;

class Receivable
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2017 00:00:00',
                '@FechaFinal' => '01-01-2018 00:00:00',
                '@CodEmp' => '001',
                '@Tipo' => "CxCEstadoCuenta"
            ])
            ->exec('dbo.usp_CuentasxCobrar_EstadoCuenta')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}