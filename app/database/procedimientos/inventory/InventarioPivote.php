<?php

namespace App\Database\Procedures\inventory;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class InventarioPivote
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