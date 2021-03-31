<?php

require '../vendor/autoload.php';
ini_set('display_errors', 1);
use function  Summit\bootstrap;
use Summit\Core\Route;
use Summit\Core\Model;
use Summit\Core\View;
use Summit\Core\Controll;
$dsn = "pgsql:host=ec2-23-21-229-200.compute-1.amazonaws.com;dbname=d1t1cfll04msd3;user=ojgnelfnhcyyly;password=66e87004ba3afdba0d431151c529c0b1b3ee9c06c1a975b57bdc1c2372a2076a";
$conn = new PDO($dsn);
try{
    // create a PostgreSQL database connection
    $conn = new PDO($dsn);

    // display a message if connected to the PostgreSQL successfully
    if($conn){
        $test = $conn->exec("CREATE TABLE PERSONS (PersonID int, LastName varchar(255))");
        print_r($test);

    }
}catch (PDOException $e){
    // report error message
    echo $e->getMessage();
}
/*
$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(
    new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => 'php://stderr',
    )
);

// Register view rendering
$app->register(
    new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
    )
);

// Our web handlers

$app->get(
    '/', function () use ($app) {
        $app['monolog']->addDebug('logging output.');
        return $app['twig']->render('index.twig');
    }
);

$app->run();
*/