<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class CampoItemFile
{
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $type = [
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
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Campo_Rubro_Ficha')
                ->fetch();
            //print_r($approve);
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