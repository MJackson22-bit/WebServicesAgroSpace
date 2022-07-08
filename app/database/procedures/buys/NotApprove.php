<?php

namespace App\Database\Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class NotApprove
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
     * > Ejecuta un procedimiento almacenado y devuelve el resultado
     *
     * @return self Los datos se devuelven como una matriz de objetos.
     */
    function get(): self
    {
        $notApprove = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodCompra' => '010833',
                '@Tipo' => 'CompraNoAprobxProvArt'
            ])
            ->exec('dbo.usp_Compras_NoAprobadas')
            ->fetch();

        $this->response($notApprove);
        return $this;
    }
}