<?php

namespace Summit\Controllers;

use Summit\Core\Controller;
use Summit\Models\Model_Student;
use Summit\Core\Circumstance;

class Controller_List extends Controller
{
    public object $student;
    public float $amountPage;
    public float $studentOnPage = 30;
    public  string $linkToPage;
    function __construct()
    {
        parent::__construct();
        $this->student = new Model_Student();
        $this->amountPage = $this->student->getQuantityPage($this->studentOnPage);
    }

    function action_index()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $this->view->generate('MetaList_View.php', 'Template_View.php');
    }

    function action_students($argument)
    {
        $model_student = new Model_Student();
        if (!empty($argument)) {
            $numberPage = $this->getNumberPage($argument) - 1;
            $offset = $numberPage * $this->studentOnPage;
            $data['quantityPage'] = $this->amountPage;
            $data['listStudent'] = $this->student->getListStudent($offset);
            $data['offset'] = $offset;
            $this->view->generate('List_View.php', 'Template_View.php', $data);
        } else {
            $linkToPage = 'http://' . Circumstance::getHostName() . Circumstance::getRequestUri() . 'page1';
            header("Location:{$linkToPage}");
            //$this->view->generate('List_View.php', 'Template_View.php', $data);
        }
    }



    function getNumberPage($argument): int
    {
        return explode('page', $argument)[1];
    }
}
