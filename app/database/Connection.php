<?php

namespace App\Database;
use App\Singleton;

class Connection
{
    use Singleton;

    private mixed $connection;
    private array $parameters = [];
    private string $host;
    private string $database;
    private string $username;
    private string $password;
    private $statement;

    private function __construct()
    {
        $this->host = '208.109.212.209';
        $this->database = 'CRAC-TIH';
        $this->username = 'sa';
        $this->password = 'Tihouse22*';
        $this->connect();
    }

    private function connect(): void
    {
        try
        {
            $this->connection = sqlsrv_connect($this->host, [
                'database' => $this->database,
                'UID' => $this->username,
                'PWD' => $this->password
            ]);
        } catch (\Exception $exception)
        {
            die($exception->getMessage());
        }
    }

    function query(string $query): self
    {
        $this->statement = sqlsrv_query(
            $this->connection,
            $query
        );

        return $this;
    }

    function exec(string $procedure): self
    {
        $keys = [];

        foreach($this->parameters as $key => $value)
        {
            $keys[] = "$key = ?";
        }

        $this->statement = sqlsrv_query(
            $this->connection,
            "EXEC $procedure " . implode(', ', $keys),
            $this->transform()
        );

        return $this;
    }

    function parameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    function fetch(): array
    {
        $result = [];

        while($row = sqlsrv_fetch_array($this->statement, SQLSRV_FETCH_ASSOC))
        {
            $result[] = $row;
        }

        return $result;
    }

    function close(): void
    {
        sqlsrv_close($this->connection);
    }

    private function transform(): array
    {
        $data = [];

        foreach($this->parameters as $value) {
            $data[] = [$value, SQLSRV_PARAM_IN];
        }

        return $data;
    }
}