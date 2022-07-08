<?php

namespace App\Database\Procedimientos\Contabilidad;
use App\Database\Conexion;
use App\Utilidades\Convertidor;

class BalanzaCuenta
{
    use Convertidor;

    private Conexion $conexion;

    /**
     * La función __construct() es una función constructora que crea una nueva instancia de la clase Conexion y la asigna
     * a la propiedad de conexión.
     */
    function __construct()
    {
        $this->conexion = Conexion::obtenerInstancia();
    }

    /**
     * Ejecuta un procedimiento almacenado y devuelve el resultado.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $approve = $this->conexion
            ->parametros([
                '@FechaInicial' => '01-01-2017 00:00:00',
                '@FechaFinal' => '01-01-2018 00:00:00',
                '@CodEmp' => '001',
                '@Cuenta' => '01-001-001-001-0001',
                '@Tipo' => "ContaBalanzaCuentaMov"
            ])
            ->ejecutar('dbo.usp_Contabilidad_BalanzaCuenta')
            ->obtener();

        $this->respuesta($approve);

        return $this;
    }
}