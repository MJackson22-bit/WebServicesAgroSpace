<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class KPI2
{
    use Convertidor;
    private Conexion $connection;

    /**
     * Crea una nueva instancia de la clase Conexión y la asigna a la propiedad $conexión
     */
    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    /**
     * Una función que se conecta a una base de datos y devuelve un resultado.
     *
     * @return self El resultado de la consulta.
     */
    function get(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@CodCiclo' => '005',
                '@CodMaq' => '00092',
                '@CodImp' => '00003',
                '@CodSAct' => '',
                '@CodArt' => '',
                '@Lote' => 'Suerte-01',
                '@FechaIni' => '01-01-2016',
                '@FechaFin' => '01-01-2019',
                '@Tipo' => "RiegoxMes"
            ])
            ->ejecutar('dbo.usp_Dashboard_KPI2')
            ->obtener();
        $this->respuesta($resultado);
        return $this;
    }
}