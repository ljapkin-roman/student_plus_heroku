<?php

namespace Summit\Core;

class Route
{
    static function start()
    {
        $controller_name = 'Main';
        $action_name = 'index';
        $argument_name = '';

        $url_components = parse_url($_SERVER['REQUEST_URI']);

        $routes = explode('/', $url_components['path']);
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
            $controller_name = ucfirst($controller_name);
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        if (!empty($routes[3])) {
            $argument_name = $routes[3];
        }


        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action = 'action_' . $action_name;


        $source = '\\Summit\\';
        $path_to_controller = "Controllers\\" . $controller_name;
        $path_to_model = "Models\\" . $model_name;
        $class_controller =  $source . $path_to_controller;
        $class_model = $source . $path_to_model;
        $controller;
        if (class_exists($class_controller)) {
            $controller = new $class_controller();
        } else {
            Route::ErrorPage404();
        }
        if (method_exists($controller, $action)) {
            $controller->$action($argument_name);
        } else {
            print_r("Error, this class is not exist " . $class_controller);
            print_r("Error, this method is not exist " . $action);
            //Route::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 NOT FOUND');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
