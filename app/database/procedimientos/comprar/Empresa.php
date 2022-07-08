<?php

namespace App\Database\Procedimientos\Comprar;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class Empresa
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
     * Una función que devuelve un objeto propio.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function get(): self
    {
        $resultado = $this->conexion
            ->parametros([
                '@FechaInicial' => '2021-05-25 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodEmp' => '001',
                '@CodProv' => '0443',
                '@Tipo' => 'ComprasEmpresaProvArt'
            ])
            ->ejecutar('dbo.usp_Compras_Empresa')
            ->obtener();

        $this->respuesta($resultado);

        return $this;
    }
}