<?php

namespace Summit\Controllers;

use Summit\Core\Controller;

class Controller_Registered extends Controller
{
    function action_index()
    {
        $this->view->generate('Registered_View.php', 'Template_View.php');
    }
}
