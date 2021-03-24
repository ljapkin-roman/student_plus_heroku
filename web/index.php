<?php

require '../vendor/autoload.php';
ini_set('display_errors', 1);
use function  Summit\bootstrap;
use Summit\Core\Route;
use Summit\Core\Model;
use Summit\Core\View;
use Summit\Core\Controller;
bootstrap();
$dbports = parse_url(getenv('DATABASE_URL'));
phpinfo();
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