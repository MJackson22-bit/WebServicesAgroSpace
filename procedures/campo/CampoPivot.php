<?php

namespace Procedures\Campo;
use App\Database\Connection;
use App\Utils\ToResponse;

class CampoPivot
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
                '@FechaInicial' => '2021-01-01 00:00:00',
                '@FechaFinal' => '2022-07-07 00:00:00',
                '@Tipo' => 'Campo'
            ])
            ->exec('dbo.usp_Campo_Pivote')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}