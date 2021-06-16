<?php


namespace Summit\Core;


class Circumstance
{
     static function getHostName()
     {
         return $_SERVER['HTTP_HOST'];
     }

     static function getRequestUri()
     {
         return $_SERVER['REQUEST_URI'];
     }
}