<?php

namespace App\Database\Procedimientos\Cuentas;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class PorPagar
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
     * > Ejecuta un procedimiento almacenado y devuelve el resultado
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $approve = $this->conexion
            ->parametros([
                '@FechaInicial' => '05-11-2016 00:00:00',
                '@FechaFinal' => '05-11-2018 00:00:00',
                '@CodEmp' => '001',
                '@CodProv' => '0001',
                '@Tipo' => "CxPPagos"
            ])
            ->ejecutar('dbo.usp_CuentasxPagar_EstadoCuenta')
            ->obtener();

        $this->respuesta($approve);

        return $this;
    }
}