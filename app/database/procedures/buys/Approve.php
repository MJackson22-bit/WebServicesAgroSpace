<?php

namespace App\Database\Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class Approve
{
    use ToResponse;

    private Connection $connection;

    /**
     * La función __construct() es una función constructora que crea una nueva instancia de la clase Connection y la asigna
     * a la propiedad de conexión.
     */
    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    /**
     * Ejecuta un procedimiento almacenado y devuelve el resultado.
     *
     * @return self La respuesta es una colección de objetos.
     */
    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodEmpresa' => '001',
                '@CodCompra' => '010833',
                '@Usuario' => 'emilio',
                '@Tipo' => 'CompraNoAprobadaDetalle'
            ])
            ->exec('dbo.usp_Compras_AprobarSINO')
            ->fetch();

        $this->response($approve);
        return $this;
    }
}