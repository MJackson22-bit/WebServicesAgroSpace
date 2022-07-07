<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoLandActivity.php';

    $activity = new CampoLandActivity();

    $activity->get();