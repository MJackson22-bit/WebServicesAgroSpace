<?php

namespace App\Database\Procedures\Maintenance;
use App\Database\Connection;
use App\Utils\ToResponse;

class Supplies
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2016 00:00:00',
                '@FechaFinal' => '05-05-2017 00:00:00',
                '@CodArt' => '01483',
                '@Tipo' => "MantInsumosArticulo"
            ])
            ->exec('dbo.usp_Mantenimiento_Insumos')
            ->fetch();

        $this->response($approve);

        return $this;
    }
}