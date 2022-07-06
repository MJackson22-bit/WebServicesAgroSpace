<?php

include_once 'Connection.php';
include_once 'utils/ToResponse.php';

class Approve
{
    use ToResponse;

    private Connection $connection;

    function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    function approve(string $query): self
    {
        $approve = $this->connection
            ->fetch($query);

        $this->response($approve);
        return $this;
    }
}