<?php

namespace Procedures\inventory;
use App\Utils\ToResponse;
use App\Database\Connection;

class InventarioSaldos
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        /*$fechaInicial = $_REQUEST['fechaInicial'];
        $fechaFinal = $_REQUEST['fechaFinal'];*/

        $inventarioSaldos = $this->connection
            ->parameters([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00'
            ])
            ->exec('dbo.usp_Inventario_Saldos')
            ->fetch();

        $this->response($inventarioSaldos);
        echo $this->toJson();
        return $this;
    }
}