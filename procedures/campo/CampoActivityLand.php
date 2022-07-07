<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class CampoActivityLand
{
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-01-06 00:00:00',
                '@FechaFinal' => '2022-07-07 00:00:00',
                '@CodCiclo' => '018',
                '@CodAct' => '018',
                '@CodFinca' => '001',
                '@Tipo' => 'CampoActividadFinca'
            ])
            ->exec('dbo.usp_Campo_Actividad_Finca')
            ->fetch();
        $json = json_encode($approve, JSON_UNESCAPED_UNICODE);
        if ($json)
            echo $json;
        else
            echo json_last_error_msg();
        return $this;
    }
}