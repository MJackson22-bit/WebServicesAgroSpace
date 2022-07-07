<?php

    include_once 'Connection.php';
    include_once 'procedures/Approve.php';

    Connection::getInstance();

    $approve = new Approve();

    print_r($approve->get()
        ->toJson());

