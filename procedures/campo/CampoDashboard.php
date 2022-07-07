<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class CampoDashboard
{
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $type = [
            "CampoCicloListado",
            "CampoRubroListado",
            "CampoLoteListado",
            "CampoPresvsEjecRubro",
            "CampoActividadesRealizadas",
            "CampoActividadListado",
            "CampoActividadesRealizadasSubAct",
            "CampoInsumosxLote",
            "CampoFamiliaListado",
            "CampoInsumosxLoteAct",
            "CampoManoObraxLote",
            "MedidoresCostoInsMO",
            "MedidoresCostoIndirecto",
            "AreaxCicloxRubro",
            "InfoLoteUbicacion",
            "InfoLoteUbicacionExtra"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@CodCiclo' => '018',
                    '@CodRubro' => '00001',
                    '@CodLote' => '018-HOR-01-01',
                    '@CodAct' => '001',
                    '@CodFam' => '001',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Campo')
                ->fetch();
            print_r($approve);
//            $json = json_encode($approve, JSON_UNESCAPED_UNICODE);
//            if ($json)
//                echo $json;
//            else
//                echo json_last_error_msg();
            $i++;
        }while($i < count($type));
        return $this;
    }
}