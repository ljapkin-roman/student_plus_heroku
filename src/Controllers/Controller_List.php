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
        $url = Circumstance::getHostName() . Circumstance::getRequestUri();
        if (!empty($argument)) {
            $url_component = parse_url($url);
            $numberPage = $this->getPageNumber($url) - 1;
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
    function action_search()
    {
        $url = Circumstance::getHostName() . Circumstance::getRequestUri();
        $searchName = $this->getParamSearch($url);
        $data['listStudent'] = $this->student->searchName($searchName);
        $this->view->generate('List_View.php', 'Template_View.php', $data);
    }



    function getPageNumber($url):int
    {
        $path = parse_url($url)['path'];
        $path_component = explode('/', $path);
        $page = array_slice($path_component, 3, 1)[0];
        $numberPage = explode('page', $page);
        return $numberPage[1];

    }
    function getParamSearch($url) :?string
    {
      $url_component = parse_url($url);
      if(isset($url_component['query']))
      {
          $searchWord = explode('=', $url_component['query'])[1];
          return $searchWord;
      }
      else {
          return null;
      }
    }
}
