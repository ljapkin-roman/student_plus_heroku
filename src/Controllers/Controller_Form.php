<?php

namespace Summit\Controllers;

use Summit\Core\Controller;

class Controller_Form extends Controller
{
    function action_index()
    {
        $this->view->generate('Form_View.php', 'Template_View.php');
    }
}
