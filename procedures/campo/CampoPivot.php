<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class CampoPivot
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
                '@FechaInicial' => '2021-01-01 00:00:00',
                '@FechaFinal' => '2022-07-07 00:00:00',
                '@Tipo' => 'Campo'
            ])
            ->exec('dbo.usp_Campo_Pivote')
            ->fetch();
        print_r($approve);
//        $json = json_encode($approve, JSON_UNESCAPED_UNICODE);
//        if ($json)
//            echo $json;
//        else
//            echo json_last_error_msg();
        return $this;
    }
}