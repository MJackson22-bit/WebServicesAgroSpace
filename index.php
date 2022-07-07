<?php

    include_once 'Connection.php';
    include_once 'procedures/contability/AccountingReportFormat.php';

    $activity = new AccountingReportFormat();

    $activity->get();