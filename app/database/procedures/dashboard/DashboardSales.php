<?php

namespace App\Database\Procedures\Dashboard;
use App\Utils\ToResponse;
use App\Database\Connection;

class DashboardSales
{
    use ToResponse;
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $type = [
            "VentasTotalesMes",
            "TipoVentasTotales",
            "TipoVentasTotalesMes",
            "EstadoVentasTotales",
            "VentasTipoArticulo"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '01-28-2020',
                    '@FechaFinal' => '07-07-2022',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Ventas')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}