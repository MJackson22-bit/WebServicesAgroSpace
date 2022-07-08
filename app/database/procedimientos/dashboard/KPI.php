<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class KPI
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
                '@CodCiclo' => '005',
                '@Anio' => 2018,
                '@Mes' => 3,
                '@CodFinca' => '001',
                '@CodAct' => '016',
                '@CodEmpresa' => '001',
                '@CodArticulo' => '0085',
                '@Tipo' => "RubroTCHFinca"
            ])
            ->ejecutar('dbo.usp_Dashboard_KPI')
            ->obtener();
        $this->respuesta($resultado);
        return $this;
    }
}