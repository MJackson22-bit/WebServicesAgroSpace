<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardItem
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
            "ListadoCiclos",
            "ListadoRubrosxCiclo",
            "ListadoRubrosxCicloOLD"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@Ciclo' => '001',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_RubroxCiclo')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}