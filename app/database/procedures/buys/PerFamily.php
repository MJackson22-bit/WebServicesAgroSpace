<?php

namespace App\Database\Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class PerFamily
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
        $perFamily = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodArt' => '03537',
                '@Tipo' => 'ComprasFamiliaProv'
            ])
            ->exec('dbo.usp_Compras_PorFamilia')
            ->fetch();

        $this->response($perFamily);
        return $this;
    }
}