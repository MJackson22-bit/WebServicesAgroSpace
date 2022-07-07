<?php
namespace Procedures\Dashboard;
use App\Utils\ToResponse;
use App\Database\Connection;
class DashboardKPI
{
    use ToResponse;
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
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