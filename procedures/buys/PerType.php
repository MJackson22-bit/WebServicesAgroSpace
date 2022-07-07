<?php

include_once 'Connection.php';
include_once 'utils/ToResponse.php';

class PerType
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

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

        print_r($perType);

        $this->response($perType);
        return $this;
    }
}