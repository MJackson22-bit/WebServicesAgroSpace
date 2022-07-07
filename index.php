<?php

    include_once 'Connection.php';
    include_once 'procedures/contability/AccountingAccountBalance.php';

    $activity = new AccountingAccountBalance();

    $activity->get();