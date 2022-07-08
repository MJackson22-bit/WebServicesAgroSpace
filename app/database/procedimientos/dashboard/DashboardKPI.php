<?php

namespace App\Database\Procedures\Dashboard;
use App\utilidades\Convertidor;
use App\Database\Conexion;

class DashboardKPI
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
            "ListadoFinca",
            "ListadoAnioMes",
            "PresupuestovsEjecucion",
            "PresupuestovsEjecucionxFinca",
            "CumplimientoTotal",
            "CumplimientoxFinca",
            "ActividadPreEjec",
            "DetalleActividadPreEjec",
            "ActividadCumplimiento",
            "SubActividadCumplimiento",
            "ConsumoPrevsEjec",
            "ListarAnio",
            "ListarArticulos",
            "DetalleConsumoEjec",
            "TCHFinca",
            "TCHFincaTotal",
            "TCHFincaGrafico",
            "RubroTCHFinca",
            "DetalleRubroTCHFinca"
        ];
        $i = 0;
        do{
            $approve = $this->connection
                ->parameters([
                    '@CodCiclo' => '005',
                    '@Anio' => 2018,
                    '@Mes' => 3,
                    '@CodFinca' => '001',
                    '@CodAct' => '016',
                    '@CodEmpresa' => '001',
                    '@CodArticulo' => '0085',
                    '@Tipo' => $type[$i]
                ])
                ->exec('dbo.usp_Dashboard_KPI')
                ->fetch();
            $this->response($approve);
            echo $this->toJson();
            $i++;
        }while($i < count($type));
        return $this;
    }
}