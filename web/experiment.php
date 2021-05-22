<?php
require '../vendor/autoload.php';
ini_set('display_errors', 1);
use Summit\Core\Experiment;
use Summit\Core\View;
use Summit\Controllers\Controller_Main;
use Summit\Core\Controller;

$list = new Controller_Main();
$list->view->pissoff();


