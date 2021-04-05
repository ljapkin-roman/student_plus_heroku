<?php
namespace Summit\Core;
class Route
{
   static function start()
   {
       $controller_name = 'Main';
       $action_name = 'index';

       $routes = explode('/', $_SERVER['REQUEST_URI']);
       if ( !empty($routes[1]) )
       {
           $controller_name = $routes[1];
           $controller_name = ucfirst($controller_name);
       }

       if ( !empty($routes[2]) )
       {
           $action_name = $routes[2];
       }


       $model_name = 'Model_'.$controller_name;
       $controller_name = 'Controller_'.$controller_name;
       $action = 'action_'.$action_name;


       $source = '\\Summit\\';
       $path_to_controller = "Controllers\\".$controller_name;
       $path_to_model = "Models\\".$model_name;
       $class_controller =  $source . $path_to_controller;
       $class_model = $source . $path_to_model;
       $contr;
       if(class_exists($class_controller))
       {
           $contr = new $class_controller;
       }
       else 
       {
           Route::ErrorPage404();
       }
       if (method_exists($class_controller, $action))
       {
           $contr->$action();
       }
       else
       {
           Route::ErrorPage404();
       }
   }

   function ErrorPage404()
   {
       $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
       header('HTTP/1.1 404 NOT FOUND');
       header("Status: 404 Not Found");
       header('Location:'.$host.'404');
   }


   }
