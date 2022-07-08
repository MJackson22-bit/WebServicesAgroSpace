<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardSales
{
    use Convertidor;
    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::getInstance();
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