<?php
require '../vendor/autoload.php';
ini_set('display_errors', 1);
use Summit\Core\Experiment;
use Summit\Core\View;
use Summit\Core\Controller;
use Summit\Controllers\Controller_Main;
use Summit\Controllers\Controller_List;

$list = new Controller_List();
$double_list = $list;



