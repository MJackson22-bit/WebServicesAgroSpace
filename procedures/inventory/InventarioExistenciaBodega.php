<?php

namespace Procedures\inventory;
use App\Utils\ToResponse;
use App\Database\Connection;

class inventarioExistenciaBodega
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
        $codEmpresa = $_REQUEST['codEmpresa'];
        $tipo = $_REQUEST['tipo'];*/

        $inventarioExistenciaBodega = $this->connection
            ->parameters([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00',
                '@CodEmpresa' => '001',
                '@Tipo' => 'InventarioConsumo'
            ])
            ->exec('dbo.usp_Inventario_ExistenciaBodega')
            ->fetch();

        $this->response($inventarioExistenciaBodega);
        echo $this->toJson();
        return $this;
    }
}