<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class CampoLandActivity
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
            "CampoFincaActividad",
            "CampoFincaActividadTotal",
            "CampoFincaActividadSubAct"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '2021-01-01 00:00:00',
                    '@FechaFinal' => '2022-07-07 00:00:00',
                    '@CodCiclo' => '018',
                    '@CodFinca' => '001',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Campo_Finca_Actividad')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
        }while($i < count($type));
        return $this;
    }
}