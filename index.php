<?php

    include_once 'Connection.php';
    include_once 'procedures/dashboard/DashboardBank.php';

    $activity = new DashboardBank();

    $activity->get();
