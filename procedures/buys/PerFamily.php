<?php

include_once 'Connection.php';
include_once 'utils/ToResponse.php';

class PerFamily
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

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

        print_r($perFamily);

        $this->response($perFamily);
        return $this;
    }
}