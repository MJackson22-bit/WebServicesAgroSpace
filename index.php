<?php

    include_once 'Connection.php';
    include_once 'procedures/dashboard/DashboardInventory.php';

    $activity = new DashboardInventory();

    $activity->get();
