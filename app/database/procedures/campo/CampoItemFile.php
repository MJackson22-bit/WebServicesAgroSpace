<?php

namespace App\Database\Procedures\Campo;
use App\Database\Connection;
use App\Utils\ToResponse;

class CampoItemFile
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
            "CampoRubroFicha",
            "CampoRubroFichaTotal",
            "CampoRubroFichaTop3"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '2021-01-01 00:00:00',
                    '@FechaFinal' => '2022-07-07 00:00:00',
                    '@CodCiclo' => '018',
                    '@CodRubro' => '00001',
                    '@CodFinca' => '001',
                    '@CodAct' => '001',
                    '@Tipo' => $types[$i]
                ])
                ->exec('dbo.usp_Campo_Rubro_Ficha')
                ->fetch();

            $this->response($approve);

            $i++;
        }while($i < count($types));
        return $this;
    }
}