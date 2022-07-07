<?php
require_once 'vendor/autoload.php';
use Procedures\Dashboard\DashboardSales;

$activity = new DashboardSales();
$activity->get();


