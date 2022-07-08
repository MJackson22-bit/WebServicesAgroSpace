<?php

namespace App\Database\Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class Provider
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
     * @return self La respuesta está siendo devuelta.
     */
    function get(): self
    {
        $provider = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-05-25 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodigoProv' => '0443',
                '@Tipo' => 'VencimientoxProveedorDetalle'
            ])
            ->exec('dbo.usp_Compras_Proveedor')
            ->fetch();

        $this->response($provider);
        return $this;
    }
}