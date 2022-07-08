<?php

namespace App\Database\Procedures\Maintenance;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class Workforce
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
                '@FechaInicial' => '01-01-2016 00:00:00',
                '@FechaFinal' => '05-05-2017 00:00:00',
                '@CodEmp' => '00014',
                '@Tipo' => "MantMOEmpleado"
            ])
            ->exec('dbo.usp_Mantenimiento_ManoObra')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}