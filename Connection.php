<?php

include_once 'Singleton.php';

class Connection
{
    use Singleton;

    private PDO|null $connection;
    private PDOStatement|null $query = null;
    private array $parameters = [];
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

    private function connect(): ?PDO
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
        $this->query = $this
            ->connection
            ->query($query);

        return $this;
    }

    function call(string $procedure): self
    {
        $params = "";

        foreach(array_keys($this->parameters) as $key)
        {
            $params .= "@$key = :$key,";
        }

        $this->query = $this
            ->connection
            ->prepare("EXEC $procedure (?, ?, ?, ?, ?, ?)");

        return $this;
    }

    function parameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    function fetch(): array
    {
        if($this->query === null)
        {
            return [];
        }

        $this->bind()
            ->execute();

        return $this->query
            ->fetchAll();
    }

    private function bind(): self
    {
        foreach ($this->parameters as $key => $value)
        {
            $this->query->bindParam(":$key", $value);
        }

        return $this;
    }

    private function execute(): self
    {
        $this->query
            ->execute();

        return $this;
    }

    function close(): void
    {
        $this->connection = null;
    }
}