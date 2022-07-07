<?php

    include_once 'Connection.php';
    include_once 'procedures/dashboard/DashboardRise.php';

    $activity = new DashboardRise();

    $activity->get();
