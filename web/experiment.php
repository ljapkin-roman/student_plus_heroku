<?php
require '../vendor/autoload.php';
ini_set('display_errors', 1);
use Summit\Core\Experiment;

$crisp = new Experiment('jorney is overprice');
$crisp->showProperty();

