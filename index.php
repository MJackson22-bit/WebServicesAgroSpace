<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoLandLot.php';

    $activity = new CampoLandLot();

    $activity->get();
