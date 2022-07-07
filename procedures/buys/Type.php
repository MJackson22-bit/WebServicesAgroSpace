<?php

include_once 'Connection.php';
include_once 'utils/ToResponse.php';

class Type
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $type = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Tipo' => 'Top5Tipo'
            ])
            ->exec('dbo.usp_Compras_Tipo')
            ->fetch();

        $this->response($type);
        return $this;
    }
}