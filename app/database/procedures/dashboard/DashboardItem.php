<?php

namespace App\Database\Procedures\Dashboard;
use App\Utils\ToResponse;
use App\Database\Connection;

class DashboardItem
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