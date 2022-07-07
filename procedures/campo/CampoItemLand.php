<?php

namespace Procedures\Campo;
use App\Database\Connection;
use App\Utils\ToResponse;

class CampoItemLand
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
            "CampoRubroFinca",
            "CampoRubroFincaTotal",
            "CampoRubroFincaTop3",
            "CampoRubroFincaLote",
            "CampoRubroFincaLoteAct"
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
                    '@CodLote' => '018-HOR-01-01',
                    '@Tipo' => $types[$i]
                ])
                ->exec('dbo.usp_Campo_Rubro_Finca')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
        }while($i < count($types));
        return $this;
    }
}