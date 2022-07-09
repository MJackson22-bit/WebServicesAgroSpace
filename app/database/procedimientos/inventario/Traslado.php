<?php

namespace App\Database\Procedimientos\Inventario;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Traslado
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
     * Una función que devuelve un objeto propio.
     *
     * @return self El resultado de la consulta.
     */
    function get(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@FechaInicial' => '2015-12-31 00:00:00',
                '@FechaFinal' => '2016-01-06 00:00:00',
                '@CodEmpresa' => '001',
                '@BodOrigen' => '',
                '@BodDestino' => '',
                '@TipoAsignar' => '',
                '@Aplicado' => '',
                '@Tipo' => 'Consumo'
            ])
            ->ejecutar('dbo.usp_Inventario_Traslado')
            ->obtener();

        $this->respuesta($resultado);
        return $this;
    }
}