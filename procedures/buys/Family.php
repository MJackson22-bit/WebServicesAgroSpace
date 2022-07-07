<?php

include_once 'Connection.php';
include_once 'utils/ToResponse.php';

class Family
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $family = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Tipo' => 'Top10Familia'
            ])
            ->exec('dbo.usp_Compras_Familia')
            ->fetch();

        $this->response($family);
        return $this;
    }
}