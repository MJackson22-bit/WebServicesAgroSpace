<?php

    include_once 'Connection.php';
    include_once 'procedures/contability/AccountingGeneralBalance.php';

    $activity = new AccountingGeneralBalance();

    $activity->get();