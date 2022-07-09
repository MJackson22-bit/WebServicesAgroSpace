<?php

namespace App\Database\Procedimientos\Cuentas;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class PorCobrar
{
    use Convertidor;

    private Conexion $conexion;

    /**
     * Esta función es un constructor de la clase.
     */
    function __construct()
    {
        $this->conexion = Conexion::obtenerInstancia();
    }

    /**
     * Una función que devuelve un objeto propio.
     *
     * @return self La respuesta de la consulta.
     */
    function obtener(): self
    {
        $approve = $this->conexion
            ->parametros([
                '@FechaInicial' => '01-01-2017 00:00:00',
                '@FechaFinal' => '01-01-2018 00:00:00',
                '@CodEmp' => '001',
                '@Tipo' => "CxCEstadoCuenta"
            ])
            ->ejecutar('dbo.usp_CuentasxCobrar_EstadoCuenta')
            ->obtener();

        $this->respuesta($approve);

        return $this;
    }
}