<?php
include_once 'Connection.php';
include_once 'utils/ToResponse.php';
class AccountingAccountBalance
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
            "ContaBalanzaCuenta",
            "ContaBalanzaCuentaMov"
        ];
        $approve = $this->connection
            ->parameters([
                '@FechaInicial' => '01-01-2017 00:00:00',
                '@FechaFinal' => '01-01-2018 00:00:00',
                '@CodEmp' => '001',
                '@Cuenta' => '01-001-001-001-0001',
                '@Tipo' => "ContaBalanzaCuentaMov"
            ])
            ->exec('dbo.usp_Contabilidad_BalanzaCuenta')
            ->fetch();
        $this->response($approve);
        echo $this->toJson();
        return $this;
    }
}