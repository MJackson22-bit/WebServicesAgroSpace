<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoPivot.php';

    $activity = new CampoPivot();

    $activity->get();