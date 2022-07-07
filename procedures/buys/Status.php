<?php

namespace Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class Status
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $status = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Estado' => 'NoRecibidas',
                '@Tipo' => 'CompraTotalxBodega'
            ])
            ->exec('dbo.usp_Compras_Estado')
            ->fetch();

        $this->response($status);
        return $this;
    }
}