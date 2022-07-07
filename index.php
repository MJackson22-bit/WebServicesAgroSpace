<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoActivityDay.php';

    $activity = new CampoActivityDay();

    $activity->get();
