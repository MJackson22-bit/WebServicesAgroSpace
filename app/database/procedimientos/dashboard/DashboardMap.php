<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardMap
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
            "ListaCiclosActivos",
            "ListaCicloFinca",
            "ListaCicloFincaLote",
            "InfoLoteRubroVariedad",
            "InfoLoteUbicacion",
            "InfoLoteUbicacionExtra"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@CodCiclo' => '006',
                    '@CodFinca' => '001',
                    '@CodLote' => '006-HOR-01-02',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_Mapa')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}