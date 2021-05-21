<?php


namespace Summit\Controllers;
use Summit\Core\Controller;
use Summit\Core\Model;
use Summit\Models\Model_Student;


class Controller_List extends Controller
{
    public  object $student;
    function __construct()
    {
        $this->student = new Model_Student();
    }

    function action_index()
    {
        $data = $this->student->getAllUser();
        $default_length = 30;
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        print_r($data);
         //$this->view->generate('List_View.php', 'Template_View.php', $data);

    }

    function action_students($argument)
    {
        $model_student=new Model_Student();
        if ( !empty($argument) )
        {
            print_r($this->getNumberPage($argument));
        }
        else {
            print_r("you sent empty request");
        }
    }



    function getNumberPage($argument): int
    {
        return explode('page', $argument)[1];
    }
}