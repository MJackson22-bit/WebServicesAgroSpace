<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Rubro
{
    use Convertidor;
    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    function get(): self
    {
        $respuesta = $this->connection
            ->parametros([
                '@Ciclo' => '001',
                '@Tipo' => 'ListadoRubrosxCicloOLD'
            ])
            ->ejecutar('dbo.usp_Dashboard_RubroxCiclo')
            ->obtener();
        $this->respuesta($respuesta);
        return $this;
    }
}