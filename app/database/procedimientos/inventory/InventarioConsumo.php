<?php

namespace App\Database\Procedures\inventory;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class InventarioConsumo
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
        $codSubBodega = $_REQUEST['codSubBodega'];
        $codFinca = $_REQUEST['codFinca'];
        $nomBodega = $_REQUEST['nomBodega'];
        $nomMaquinaria = $_REQUEST['nomMaquinaria'];
        $aplicado = $_REQUEST['aplicado'];
        $tipo = $_REQUEST['tipo'];*/

        $inventarioConsumo = $this->connection
            ->parameters([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00',
                '@CodEmpresa' => '001',
                '@CodSubBodega' => '01',
                '@CodFinca' => '001',
                '@NomBodega' => 'BODEGA FINCA',
                '@NomMaquinaria' => 'NINGUNO',
                '@Aplicado' => 'Maquinaria',
                '@Tipo' => 'InventarioConsumo'
            ])
            ->exec('dbo.usp_Inventario_Consumo')
            ->fetch();

        $this->response($inventarioConsumo);
        echo $this->toJson();
        return $this;
    }
}