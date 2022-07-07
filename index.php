<?php

    include_once 'Connection.php';
    include_once 'procedures/campo/CampoItemActivity.php';

    $activity = new CampoItemActivity();

    $activity->get();
