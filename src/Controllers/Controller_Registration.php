<?php
namespace Summit\Controllers;
use Summit\Core\Controller;
use Summit\Models\Model_Student;
use Summit\Validators\Validator_Student;
use Summit\Controllers\Controller_Main;

class Controller_Registration extends Controller
{
    function action_index($data = null, $query = null)
    {
        $model_student = new Model_Student();
        if (isset($_COOKIE['PHPSESSID']))
        {
            $session_id = $_COOKIE['PHPSESSID'];
            if ($model_student->is_session_exist($session_id))
            {
                $model_student->redact_student($session_id);
                $data['data'] = $model_student->get_data_student($session_id)[0];
                $this->view->generate('Form_View.php', 'Template_View.php', $data);
            } else {
                print_r("session is exist but it isn't in database");
                $this->view->generate('Form_View.php', 'Template_View.php', $data);
            }

        } else {
            print_r("same number session is not in database because i will return record form");
            $this->view->generate('Form_View.php', 'Template_View.php', $data);
        }

    }

    function action_validate()
    {
        $validator = new Validator_Student();
        $result = $validator->action_validate($_POST);
        if (!empty($result['errors'])) {
            $this->action_index($result);
        } else {
            $db = new Model_Student();
            session_start();
            $result['data']['session_id'] = $_COOKIE['PHPSESSID'];
            setcookie('user_email', $result['data']['email'], time()+60*60*24*30, '/');
            $db->recordUser($result['data']);


            $this->redirect();
        }

    }

    public function action_edit($session_id)
    {
        $this->model_student->redact_student($session_id);
        $data['data'] = $this->model_student->get_data_student($session_id)[0];
        $this->view->generate('Form_View.php', 'Template_View.php', $data);
    }

    function redirect()
    {
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/registered');
    }


}