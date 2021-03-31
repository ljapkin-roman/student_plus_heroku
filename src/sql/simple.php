<?php
$sqlFolder = str_replace('\\', '/', realpath(dirname(__FILE__)) . '/');
$allFiles = glob($sqlFolder . '*.sql');
$DB_NAME = 'ROMA BASE';
$TABLE_VERSION = "VERSION 2";
$query = sprintf("show tables from %s like %s", $DB_NAME, $TABLE_VERSION);

