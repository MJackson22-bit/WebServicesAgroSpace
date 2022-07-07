<?php

    include_once 'Connection.php';
    include_once 'procedures/dashboard/DashboardBuy.php';

    $activity = new DashboardBuy();

    $activity->get();
