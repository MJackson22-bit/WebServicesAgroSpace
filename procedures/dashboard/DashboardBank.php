<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class DashboardBank
{
    use ToResponse;
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }
    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-1-2012 00:00:00',
                '@FechaFinal' => '01-1-2017 00:00:00',
                '@Tipo' => 'Disponibilidad'
            ])
            ->exec('dbo.usp_Dashboard_Banco')
            ->fetch();
        $this->response($approve);
        echo $this->toJson();
        return $this;
    }
}