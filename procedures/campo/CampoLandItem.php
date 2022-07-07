<?php

namespace Procedures\Campo;
use App\Database\Connection;
use App\Utils\ToResponse;

class CampoLandItem
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
            "CampoFincaRubro",
            "CampoFincaRubroCuenta",
            "CampoFincaRubroTop5",
            "CampoFincaRubroActividad"
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
                    '@Tipo' => $types[$i]
                ])
                ->exec('dbo.usp_Campo_Finca_Rubro')
                ->fetch();

            $this->response($approve);

            $i++;
        }while($i < count($types));
        return $this;
    }
}