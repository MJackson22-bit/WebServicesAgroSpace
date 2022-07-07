<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class DashboardKPI2
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
            "ListadoRecursos",
            "ListadoImplementos",
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
                    '@CodMaq' => '00092',
                    '@CodImp' => '00003',
                    '@CodSAct' => '',
                    '@CodArt' => '',
                    '@Lote' => 'Suerte-01',
                    '@FechaIni' => '01-01-2016',
                    '@FechaFin' => '01-01-2019',
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