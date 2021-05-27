<?php
namespace Summit\Core;
use Summit\Core\View;

class Controller
{
    public object $view;
    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        print_r("action method parent");
    }
}