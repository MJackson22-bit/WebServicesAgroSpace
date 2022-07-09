<?php

namespace App\Database\Procedimientos\Campo;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class FincaRubro
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
     * Una función que se llama desde una clase que se conecta a una base de datos y ejecuta un procedimiento almacenado.
     *
     * @return self El resultado de la consulta.
     */
    function obtener(): self
    {
        $resultado = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-01-01 00:00:00',
                '@FechaFinal' => '2022-07-07 00:00:00',
                '@CodCiclo' => '018',
                '@CodRubro' => '00001',
                '@CodFinca' => '001',
                '@Tipo' => 'CampoFincaRubro'
            ])
            ->ejecutar('dbo.usp_Campo_Finca_Rubro')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}