<?php

namespace App\Database\Procedures\Campo;
use App\Database\Connection;
use App\Utils\ToResponse;

class CampoActivityDay
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
            "CampoActividadDia",
            "CampoActividadDiaTotal",
            "CampoActividadDiaSubAct"
        ];

        $i = 0;

        do {
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '2015-01-07 00:00:00',
                    '@FechaFinal' => '2016-06-30 00:00:00',
                    '@CodCiclo' => '001',
                    '@CodAct' => '002',
                    '@Tipo' => $types[$i]
                ])
                ->exec('dbo.usp_Campo_Actividad_Dia')
                ->fetch();

            $this->response($approve);

            $i++;
        }while($i < count($types));

        return $this;
    }
}