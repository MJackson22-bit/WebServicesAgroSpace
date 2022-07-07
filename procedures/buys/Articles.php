<?php

namespace Procedures\Buys;
use App\Utils\ToResponse;
use App\Database\Connection;

class Articles
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $articles = $this->connection
            ->parameters([
                '@FechaInicial' => '2021-08-19 00:00:00',
                '@FechaFinal' => '2021-11-06 00:00:00',
                '@CodigoArt' => '03537',
                '@Tipo' => 'CompraProveedorxArticulo'
            ])
            ->exec('dbo.usp_Compras_Articulo')
            ->fetch();

        $this->response($articles);
        return $this;
    }
}