<?php

namespace Procedures\inventory;
use App\Utils\ToResponse;
use App\Database\Connection;

class inventarioOtrosMov
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
        return $this;
    }
}