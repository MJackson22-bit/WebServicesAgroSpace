<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class AccountingDaily
{
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $type = [
            "EmpresaListado",
            "ContaDiario",
            "ContaDiarioDetalle"
        ];
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2016 00:00:00',
                '@FechaFinal' => '01-01-2018 00:00:00',
                '@CodEmp' => '001',
                '@Asiento' => '0000000148',
                '@Tipo' => "ContaDiarioDetalle"
            ])
            ->exec('dbo.usp_Contabilidad_Diario')
            ->fetch();
        print_r($approve);
//            $json = json_encode($approve, JSON_UNESCAPED_UNICODE);
//            if ($json)
//                echo $json;
//            else
//                echo json_last_error_msg();
        return $this;
    }
}