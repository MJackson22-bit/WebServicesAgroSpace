<?php

namespace Procedures\inventory;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class InventarioTraslado
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
        $bodOrigen = $_REQUEST['bodOrigen'];
        $bodDestino = $_REQUEST['bodDestino'];
        $tipoAsignar = $_REQUEST['tipoAsignar'];
        $aplicado = $_REQUEST['aplicado'];
        $tipo = $_REQUEST['tipo'];*/

        $inventarioTraslado = $this->connection
            ->parameters([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00',
                '@CodEmpresa' => '001',
                '@BodOrigen' => '',
                '@BodDestino' => '',
                '@TipoAsignar' => '',
                '@Aplicado' => '',
                '@Tipo' => 'InventarioConsumo'
            ])
            ->exec('dbo.usp_Inventario_Traslado')
            ->fetch();

        $this->response($inventarioTraslado);
        return $this;
    }
}