<?php

namespace App\Database\Procedures\Dashboard;
use App\Utils\ToResponse;
use App\Database\Connection;

class DashboardRate
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
            "RatiosxCiclos",
            "RatiosxCiclosDinamico"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@CodArt' => '00085',
                    '@CodRubro' => '00002',
                    '@CodAct' => '001',
                    '@CodSAct' => '0077',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Ratios')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}