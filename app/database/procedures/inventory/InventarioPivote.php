<?php

namespace App\Database\Procedures\inventory;
use App\Utils\ToResponse;
use App\Database\Connection;

class InventarioPivote
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
        $fechaFinal = $_REQUEST['fechaFinal'];
        $tipo = $_REQUEST['tipo'];*/

        $inventarioPivote = $this->connection
            ->parameters([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00',
                '@Tipo' => 'InventarioConsumo'
            ])
            ->exec('dbo.usp_Inventario_Pivote')
            ->fetch();

        $this->response($inventarioPivote);
        echo $this->toJson();
        return $this;
    }
}