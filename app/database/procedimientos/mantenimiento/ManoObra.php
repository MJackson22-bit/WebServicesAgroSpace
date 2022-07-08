<?php

namespace App\Database\Procedimientos\Mantenimiento;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class ManoObra
{
    use Convertidor;

    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    function get(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@FechaInicial' => '01-01-2016 00:00:00',
                '@FechaFinal' => '05-05-2017 00:00:00',
                '@CodEmp' => '00014',
                '@Tipo' => "MantMOEmpleado"
            ])
            ->ejecutar('dbo.usp_Mantenimiento_ManoObra')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}