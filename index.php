<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoDashboard.php';

    $activity = new CampoDashboard();

    $activity->get();
