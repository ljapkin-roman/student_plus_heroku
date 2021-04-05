<?php
namespace Summit\Controllers;
use Summit\Core\Controller;
use Summit\Models\Model_Student;
use Summit\Validators\Validator_Student;

class Controller_Registration extends Controller
{
    function action_index($data = null, $query = null)
    {
        $this->view->generate('Form_View.php', 'Template_View.php', $data);
    }

    function action_validate()
    {
        $validator = new Validator_Student();
        $result = $validator->action_validate($_POST);
        if (!empty($result['errors'])) {
            $this->action_index($result);
        } else {
            $db = new Model_Student();
            $db->recordUser($result['data']);
            session_start();
            setcookie('user_email', $result['data']['email'], time()+60*60*24*30, '/');
        }

    }
}