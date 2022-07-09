<?php

namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Mapa
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
     * Una función que devuelve un objeto de la misma clase.
     *
     * @return self El resultado de la consulta.
     */
    function get(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@CodCiclo' => '006',
                '@CodFinca' => '001',
                '@CodLote' => '006-HOR-01-02',
                '@Tipo' => "InfoLoteUbicacion"
            ])
            ->ejecutar('dbo.usp_Dashboard_Mapa')
            ->obtener();
        $this->respuesta($resultado);
        return $this;
    }
}