<?php
namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;
class Compra
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
     * Una función que devuelve un objeto propio.
     *
     * @return self La respuesta de la consulta.
     */
    function get(): self
    {
        $respuesta = $this->connection
            ->parametros([
                '@FechaInicial' => '01-01-2020 00:00:00',
                '@FechaFinal' => '07-07-2022 00:00:00',
                '@Tipo' => "ComprasTotalesxFamilia"
            ])
            ->ejecutar('dbo.usp_Dashboard_Compra')
            ->obtener();
        $this->respuesta($respuesta);
        return $this;
    }
}