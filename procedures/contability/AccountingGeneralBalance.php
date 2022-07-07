<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class AccountingGeneralBalance
{
    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function get(): self
    {
        $type = [
            "ContaBalanzaGeneral",
            "ContaBalanzaGeneralMov"
        ];
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2017 00:00:00',
                '@FechaFinal' => '06-06-2017 00:00:00',
                '@CodEmp' => '001',
                '@Cuenta' => '01-001-001-001-0001',
                '@Tipo' => "ContaBalanzaGeneralMov"
            ])
            ->exec('dbo.usp_Contabilidad_BalanzaCuenta')
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