<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class AccountingReportFormat
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
            "Saldo",
            "SaldoGrupo"
        ];
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2017',
                '@FechaFinal' => '01-01-2018',
                '@CodRpt' => 1,
                '@Moneda' => 'COR',
                '@Tipo' => 'Saldo'
            ])
            ->exec('dbo.usp_Contabilidad_FormatoReporte')
            ->fetch();
        $this->response($approve);
        echo $this->toJson();
        return $this;
    }
}