<?php

    include_once 'Connection.php';
    include_once 'procedures/contability/AccountingResultStatus.php';

    $activity = new AccountingResultStatus();

    $activity->get();