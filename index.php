<?php

    include_once 'Connection.php';
    include_once 'procedures/dashboard/DashboardCampo.php';

    $activity = new DashboardCampo();

    $activity->get();
