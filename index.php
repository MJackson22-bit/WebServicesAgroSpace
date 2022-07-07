<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoActivityItem.php';

    $activity = new CampoActivityItem();

    $activity->get();
