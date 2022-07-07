<?php

    include_once 'Connection.php';
    include_once 'procedures/dashboard/DashboardKPI.php';

    $activity = new DashboardKPI();

    $activity->get();
