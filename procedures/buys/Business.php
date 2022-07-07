<?php

namespace Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class Business
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $business = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-05-25 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodEmp' => '001',
                '@CodProv' => '0443',
                '@Tipo' => 'ComprasEmpresaProvArt'
            ])
            ->exec('dbo.usp_Compras_Empresa')
            ->fetch();

        $this->response($business);
        return $this;
    }
}