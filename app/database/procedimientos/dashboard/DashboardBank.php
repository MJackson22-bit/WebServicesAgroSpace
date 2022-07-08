<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardBank
{
    use Convertidor;
    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::getInstance();
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