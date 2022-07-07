<?php

namespace Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class Approve
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
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodEmpresa' => '001',
                '@CodCompra' => '010833',
                '@Usuario' => 'emilio',
                '@Tipo' => 'CompraNoAprobadaDetalle'
            ])
            ->exec('dbo.usp_Compras_AprobarSINO')
            ->fetch();

        $this->response($approve);
        return $this;
    }
}