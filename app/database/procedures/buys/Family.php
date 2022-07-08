<?php

namespace App\Database\Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class Family
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
     * > Obtiene datos de un procedimiento almacenado y los devuelve como respuesta
     *
     * @return self La respuesta está siendo devuelta.
     */
    function get(): self
    {
        $family = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@Tipo' => 'Top10Familia'
            ])
            ->exec('dbo.usp_Compras_Familia')
            ->fetch();

        $this->response($family);
        return $this;
    }
}