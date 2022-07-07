<?php
require_once 'vendor/autoload.php';
use Procedures\Dashboard\DashboardRate;



$activity = new DashboardRate();
$activity->get();


