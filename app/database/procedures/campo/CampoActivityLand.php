<?php

namespace ProceduApp\Database\res\Campo;
use App\Database\Connection;
use App\Utils\ToResponse;

class CampoActivityLand
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
            "CampoActividadFinca",
            "CampoActividadFincaCuenta",
            "CampoActividadFincaTop5",
            "CampoActividadFincaArticulo"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '2021-01-06 00:00:00',
                    '@FechaFinal' => '2022-07-07 00:00:00',
                    '@CodCiclo' => '018',
                    '@CodAct' => '018',
                    '@CodFinca' => '001',
                    '@Tipo' => $types[$i]
                ])
                ->exec('dbo.usp_Campo_Actividad_Finca')
                ->fetch();

            $this->response($approve);

            $i++;
        }while($i < count($types));
        return $this;
    }
}