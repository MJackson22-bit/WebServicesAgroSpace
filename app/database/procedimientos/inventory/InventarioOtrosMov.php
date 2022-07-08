<?php

namespace App\Database\Procedures\inventory;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class InventarioOtrosMov
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
        $tipoMov = $_REQUEST['tipoMov'];
        $nomFamilia = $_REQUEST['nomFamilia'];
        $nomTipoArt = $_REQUEST['nomTipoArt'];
        $tipo = $_REQUEST['tipo'];*/

        $inventarioOtrosMov = $this->connection
            ->parameters([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00',
                '@CodEmpresa' => '001',
                '@TipoMov' => '',
                '@NomFamilia' => '',
                '@NomTipoArt' => '',
                '@Tipo' => 'InventarioConsumo'
            ])
            ->exec('dbo.usp_Inventario_OtrosMov')
            ->fetch();

        $this->response($inventarioOtrosMov);
        echo $this->toJson();
        return $this;
    }
}