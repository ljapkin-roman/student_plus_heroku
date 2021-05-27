<?php


namespace Summit\Controllers;
use Summit\Core\Controller;
use Summit\Models\Model_Student;


class Controller_List extends Controller
{
    public  object $student;
    public float $amountPage;
    public float $studentOnPage=30;
    function __construct()
    {
        parent::__construct();
        $this->student = new Model_Student();
        $this->amountPage = $this->student->getQuantityPage($this->studentOnPage);
    }

    function action_index()
    {
        $data = $this->student->getAllUser();
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        print_r($data);
         //$this->view->generate('List_View.php', 'Template_View.php', $data);

    }

    function action_students($argument)
    {
        $model_student=new Model_Student();
        if ( !empty($argument) )
        {
            $numberPage = $this->getNumberPage($argument) - 1;
            $offset = $numberPage * $this->studentOnPage;
            $data['quantityPage']= $this->amountPage;
            $data['listStudent'] = $this->student->getListStudent($offset);
            $data['offset'] = $offset;
            $this->view->generate('List_View.php', 'Template_View.php', $data);
        }
        else {
            $data = "pook";
            print_r('check out is passed');
            //$this->view->generate('List_View.php', 'Template_View.php', $data);
        }
    }



    function getNumberPage($argument): int
    {
        return explode('page', $argument)[1];
    }
}