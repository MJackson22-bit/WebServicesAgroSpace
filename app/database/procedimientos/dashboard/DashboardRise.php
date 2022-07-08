<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardRise
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
            "ListadoFinca",
            "VolumenLluvia"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '01-01-2016',
                    '@FechaFinal' => '06-01-2016',
                    '@Finca' => 'HORMIGUERO',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Lluvia')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}