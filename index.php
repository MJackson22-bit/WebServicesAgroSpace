<?php

    include_once 'Connection.php';
    include_once 'procedures/dashboard/DashboardKPI2.php';

    $activity = new DashboardKPI2();

    $activity->get();
