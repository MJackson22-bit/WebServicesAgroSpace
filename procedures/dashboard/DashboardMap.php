<?php
namespace Procedures\Dashboard;
use App\Utils\ToResponse;
use App\Database\Connection;
class DashboardMap
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
            "ListaCiclosActivos",
            "ListaCicloFinca",
            "ListaCicloFincaLote",
            "InfoLoteRubroVariedad",
            "InfoLoteUbicacion",
            "InfoLoteUbicacionExtra"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@CodCiclo' => '006',
                    '@CodFinca' => '001',
                    '@CodLote' => '006-HOR-01-02',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Mapa')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}