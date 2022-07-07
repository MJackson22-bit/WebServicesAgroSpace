<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoLandItem.php';

    $activity = new CampoLandItem();

    $activity->get();
