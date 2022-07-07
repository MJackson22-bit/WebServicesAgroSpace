<?php
namespace Procedures\Dashboard;
use App\Utils\ToResponse;
use App\Database\Connection;
class DashboardInventory
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
            "InvxFamilia",
            "InvxBodega",
            "InvConsumoxRubro",
            "InvConsumoxMaquinaria",
            "InvDistribucionxRubro",
            "InvDistribucionxTipoMaq",
            "InvVolumenConsumo",
            "InvCostoxRubro"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '04-15-2020',
                    '@FechaFinal' => '07-07-2022',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Inventario')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}