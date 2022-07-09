<?php
namespace App\Database\Procedimientos\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;
class Campo
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
                '@CodCiclo' => '018',
                '@CodRubro' => '00001',
                '@CodLote' => '018-HOR-01-01',
                '@CodAct' => '001',
                '@CodFam' => '001',
                '@Tipo' => 'CampoInsumosxLoteAct'
            ])
            ->ejecutar('dbo.usp_Dashboard_Campo')
            ->obtener();
        $this->respuesta($respuesta);
        return $this;
    }
}