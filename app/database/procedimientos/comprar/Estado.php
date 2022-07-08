<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Estado
{
    use Convertidor;

    private Conexion $conexion;

    function __construct()
    {
        $this->conexion = Conexion::obtenerInstancia();
    }

    /**
     * > Ejecuta un procedimiento almacenado y devuelve el resultado
     *
     * @return self La respuesta está siendo devuelta.
     */
    function get(): self
    {
        $resultado = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Estado' => 'NoRecibidas',
                '@Tipo' => 'CompraTotalxBodega'
            ])
            ->ejecutar('dbo.usp_Compras_Estado')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}