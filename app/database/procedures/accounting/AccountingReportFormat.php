<?php

namespace App\Database\Procedures\Accounting;
use App\Database\Connection;
use App\Utils\ToResponse;

class AccountingReportFormat
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
                '@FechaInicial' => '01-01-2017',
                '@FechaFinal' => '01-01-2018',
                '@CodRpt' => 1,
                '@Moneda' => 'COR',
                '@Tipo' => 'Saldo'
            ])
            ->exec('dbo.usp_Contabilidad_FormatoReporte')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}