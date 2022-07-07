<?php

namespace Procedures\Accounting;
use App\Database\Connection;
use App\Utils\ToResponse;

class AccountingResultStatus
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