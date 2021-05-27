<?php
namespace Summit\Controllers;
use Summit\Core\Controller;
class Controller_Main extends Controller
{
    function __construct()
    {
    }

    function action_index()
    {
        $this->view->generate('Main_View.php', 'Template_View.php');
    }
}