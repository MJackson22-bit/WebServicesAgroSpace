<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class PorFamilia
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
     * @return self Los datos se devuelven como una matriz de objetos.
     */
    function obtener(): self
    {
        $resultado = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodArt' => '03537',
                '@Tipo' => 'ComprasFamiliaProv'
            ])
            ->ejecutar('dbo.usp_Compras_PorFamilia')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}