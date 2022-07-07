<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class CampoActivityDay
{
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }
    function get(): self
    {
        $type = [
            "CampoActividadDia",
            "CampoActividadDiaTotal",
            "CampoActividadDiaSubAct"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '2015-01-07 00:00:00',
                    '@FechaFinal' => '2016-06-30 00:00:00',
                    '@CodCiclo' => '001',
                    '@CodAct' => '002',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Campo_Actividad_Dia')
                ->fetch();
            $json = json_encode($approve, JSON_UNESCAPED_UNICODE);
            if ($json)
                echo $json;
            else
                echo json_last_error_msg();
            $i++;
        }while($i < count($type));
        return $this;
    }
}