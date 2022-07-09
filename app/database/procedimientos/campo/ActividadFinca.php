<?php

namespace App\Database\Procedimientos\Campo;
use App\Database\Conexion;
use App\utilidades\Convertidor;

class ActividadFinca
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
     * Una función que se utiliza para obtener los datos de la base de datos.
     *
     * @return self El resultado de la consulta.
     */
    function obtener(): self
    {
        $resultado = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-01-06 00:00:00',
                '@FechaFinal' => '2022-07-07 00:00:00',
                '@CodCiclo' => '018',
                '@CodAct' => '018',
                '@CodFinca' => '001',
                '@Tipo' => 'CampoActividadFinca'
            ])
            ->ejecutar('dbo.usp_Campo_Actividad_Finca')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}