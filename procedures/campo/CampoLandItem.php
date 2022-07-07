<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class CampoLandItem
{
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }
    function get(): self
    {
        $type = [
            "CampoFincaLote",
            "CampoFincaLoteCuenta",
            "CampoFincaLoteTop5",
            "CampoFincaLoteArticulo"
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
                    '@CodLote' => '018-HOR-01-02',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Campo_Finca_Lote')
                ->fetch();
            //echo print_r($approve);
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