<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoActivityLand.php';

    $activity = new CampoActivityLand();

    $activity->get();
