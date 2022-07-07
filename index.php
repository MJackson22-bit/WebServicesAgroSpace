<?php

    include_once 'Connection.php';
    include_once 'procedures/contability/AccountingDaily.php';

    $activity = new AccountingDaily();

    $activity->get();