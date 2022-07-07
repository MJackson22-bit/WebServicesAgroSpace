<?php
require_once 'vendor/autoload.php';
use Procedures\Dashboard\DashboardPrevExec;



$activity = new DashboardPrevExec();
$activity->get();


