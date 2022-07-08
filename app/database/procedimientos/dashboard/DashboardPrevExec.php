<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardPrevExec
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
            "PresupuestovsEjecucion",
            "PresupuestovsEjecucionDet"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '01-01-2016',
                    '@FechaFinal' => '04-01-2017',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_PrevsEjec')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}