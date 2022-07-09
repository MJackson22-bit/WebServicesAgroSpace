<?php
namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;
class Inventario
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
     * Una función que devuelve un objeto de la misma clase.
     *
     * @return self La respuesta de la consulta.
     */
    function get(): self
    {
        $respuesta = $this->connection
            ->parametros([
                '@FechaInicial' => '04-15-2020',
                '@FechaFinal' => '07-07-2022',
                '@Tipo' => "InvVolumenConsumo"
            ])
            ->ejecutar('dbo.usp_Dashboard_Inventario')
            ->obtener();
        $this->respuesta($respuesta);
        return $this;
    }
}