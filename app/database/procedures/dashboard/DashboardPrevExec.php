<?php

namespace App\Database\Procedures\Dashboard;
use App\Utils\ToResponse;
use App\Database\Connection;

class DashboardPrevExec
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