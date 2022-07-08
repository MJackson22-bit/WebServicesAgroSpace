<?php

namespace App\Database\Procedures\contabilidad;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class BalanceGeneral
{
    use Convertidor;
    private Conexion $connection;

    /**
     * La función __construct() es una función constructora que crea una nueva instancia de la clase Conexion y la asigna
     * a la propiedad de conexión.
     */
    function __construct()
    {
        $this->connection = Conexion::obtenerInstancia();
    }

    /**
     * Una función que devuelve un objeto propio.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function obtener(): self
    {
        $resultado = $this->connection
            ->parametros([
                '@FechaInicial' => '01-01-2017 00:00:00',
                '@FechaFinal' => '06-06-2017 00:00:00',
                '@CodEmp' => '001',
                '@Cuenta' => '01-001-001-001-0001',
                '@Tipo' => "ContaBalanzaGeneralMov"
            ])
            ->ejecutar('dbo.usp_Contabilidad_BalanzaGeneral')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}