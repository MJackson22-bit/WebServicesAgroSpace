<?php

namespace App\Database\Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class PerType
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
     * @return self La consulta devuelve una sola fila con las siguientes columnas:
     */
    function get(): self
    {
        $perType = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-05-25 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodEmp' => '001',
                '@CodProv' => '0443',
                '@Tipo' => 'ComprasTipoEmpProv'
            ])
            ->exec('dbo.usp_Compras_PorTipo')
            ->fetch();

        $this->response($perType);
        return $this;
    }
}