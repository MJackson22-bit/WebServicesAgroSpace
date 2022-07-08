<?php

namespace App\Database\Procedimientos\Inventario;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class ExistenciaBodega
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
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00',
                '@CodEmpresa' => '001',
                '@Tipo' => 'Consumo'
            ])
            ->ejecutar('dbo.usp_Inventario_ExistenciaBodega')
            ->obtener();

        $this->respuesta($resultado);
        return $this;
    }
}