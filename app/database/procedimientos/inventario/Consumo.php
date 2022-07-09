<?php

namespace App\Database\Procedimientos\Inventario;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Consumo
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
     * Ejecuta un procedimiento almacenado y devuelve el resultado.
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
                '@CodSubBodega' => '01',
                '@CodFinca' => '001',
                '@NomBodega' => 'BODEGA FINCA',
                '@NomMaquinaria' => 'NINGUNO',
                '@Aplicado' => 'Maquinaria',
                '@Tipo' => 'Consumo'
            ])
            ->ejecutar('dbo.usp_Inventario_Consumo')
            ->obtener();
        $this->respuesta($resultado);
        return $this;
    }
}