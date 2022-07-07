<?php

    include_once 'Connection.php';
    include_once 'procedures/PivotBuys.php';

    $buys = new PivotBuys();

    $buys->get();
