<?php

include_once 'Connection.php';
include_once 'utils/ToResponse.php';

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
                'FechaInicial' => '2015-01-01',
                'FechaFinal' => '2022-01-31',
            ])
            ->call('dbo.usp_Compras_AprobarSINO')
            ->fetch();

        $this->response($approve);
        return $this;
    }
}