<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardKPI2
{
    use Convertidor;
    private Conexion $connection;

    function __construct()
    {
        $this->connection = Conexion::getInstance();
    }

    function get(): self
    {
        $type = [
            "ListadoRecursos",
            "ListadoImplementos",
            "ListaLotes",
            "ListadoSubActividad",
            "ListadoArticulos",
            "Riego",
            "RiegoxMes",
            "RiegoxConsumo",
            "RiegoxArticulo"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@CodCiclo' => '005',
                    '@CodMaq' => '00092',
                    '@CodImp' => '00003',
                    '@CodSAct' => '',
                    '@CodArt' => '',
                    '@Lote' => 'Suerte-01',
                    '@FechaIni' => '01-01-2016',
                    '@FechaFin' => '01-01-2019',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_KPI2')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}