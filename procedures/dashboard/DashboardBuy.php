<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class DashboardBuy
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
            "ComprasTotalesMes",
            "TipoComprasTotales",
            "ComprasPresupPedCompras",
            "TipoComprasTotalesxMes",
            "ComprasTotalesxFamilia",
            "ComprasCumplimiento",
            "ComprasPrioridad"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '01-01-2020 00:00:00',
                    '@FechaFinal' => '07-07-2022 00:00:00',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Compra')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}