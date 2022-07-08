<?php

namespace App\Database\Procedures\inventory;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class inventarioExistenciaBodega
{
    use Convertidor;

    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::getInstance();
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