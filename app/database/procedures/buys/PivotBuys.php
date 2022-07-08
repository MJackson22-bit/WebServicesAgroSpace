<?php

namespace App\Database\Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class PivotBuys
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
     * Devuelve una respuesta de la base de datos.
     *
     * @return self La respuesta está siendo devuelta.
     */
    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Tipo' => 'Compras'
            ])
            ->exec('dbo.usp_Compras_Pivote')
            ->fetch();

        $this->response($approve);
        return $this;
    }
}