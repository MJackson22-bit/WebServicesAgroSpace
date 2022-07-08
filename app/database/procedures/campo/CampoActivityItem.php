<?php

namespace App\Database\Procedures\Campo;
use App\Database\Connection;
use App\Utils\ToResponse;

class CampoActivityItem
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $types = [
            "CampoActividadRubro",
            "CampoActividadRubroTotal",
            "CampoActividadRubroTop5",
            "CampoActividadRubroArticulo"
        ];

        $i = 0;

        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '2021-01-01 00:00:00',
                    '@FechaFinal' => '2022-07-07 00:00:00',
                    '@CodCiclo' => '018',
                    '@CodAct' => '018',
                    '@CodRubro' => '001',
                    '@Tipo' => $types[$i]
                ])
                ->exec('dbo.usp_Campo_Actividad_Rubro')
                ->fetch();

            $this->response($approve);

            $i++;
        }while($i < count($types));

        return $this;
    }
}