<?php

include_once 'Connection.php';
include_once 'utils/ToResponse.php';

class PivotBuys
{

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
                '@Tipo' => 'Compras'
            ])
            ->exec('dbo.usp_Compras_Pivote')
            ->fetch();
        $json = json_encode($approve, JSON_UNESCAPED_UNICODE);
        if ($json)
            echo $json;
        else
            echo json_last_error_msg();
        return $this;
    }
}