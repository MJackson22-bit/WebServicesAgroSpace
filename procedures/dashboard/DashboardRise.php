<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class DashboardRise
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
            "ListadoFinca",
            "VolumenLluvia"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@FechaInicial' => '01-01-2016',
                    '@FechaFinal' => '06-01-2016',
                    '@Finca' => 'HORMIGUERO',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Lluvia')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}