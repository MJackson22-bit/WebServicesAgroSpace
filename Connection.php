<?php

include_once 'Singleton.php';

class Connection
{
    use Singleton;

    private readonly PDO|null $connection;
    private readonly string $host;
    private readonly string $database;
    private readonly string $username;
    private readonly string $password;

    private function __construct()
    {
        $this->host = '208.109.212.209';
        $this->database = 'CRAC-TIH';
        $this->username = 'sa';
        $this->password = 'Tihouse22*';
        $this->connection = $this->connect();
    }

    function connect(): ?PDO
    {
        try
        {
            return new PDO(
                "sqlsrv:server=$this->host;database=$this->database",
                $this->username,
                $this->password
            );
        } catch (Exception $exception)
        {
            die($exception->getMessage());
        }
    }

    function query(string $query): self
    {
        $this->connection
            ->query($query);

        return $this;
    }

    function fetch(string $query): array
    {
        return $this->connection
            ->query($query)
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}