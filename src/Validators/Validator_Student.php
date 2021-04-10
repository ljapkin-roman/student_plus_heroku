<?php
namespace Summit\Validators;

use Summit\Core\Validator as Validator;
use Summit\Core\Model as Model;

class Validator_Student extends Validator
{
    public $errorData = [];

    private function validFirstName($first_name)
    {
        if (strlen($first_name) > 200) {
            $this->errorData['first_name'] = "Имя не может быть больше 200знаков!";
        }
    }

    private function validLastName($last_name)
    {
        if (strlen('last_name') > 200) {
            $this->errorData['first_name'] = "Фамилия не может быть больше 200знаков!";
        }
    }

    private function validEmail($email)
    {
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorData['email'] = "Адресс почты не валиден!";
        }

        if (strlen($email) > 200 ) {
            $this->errorData['email'] = "Название почты имеет больше 200 знаков!";
        }

        $model = new Model();
        $sql = 'SELECT email FROM Students WHERE email = :email';
        $toCheck = $model->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $toCheck->execute(array(':email' => $email));
        $result = $toCheck->fetchAll();
        if (!empty($result)) {
            $this->errorData['email'] = "Такой емайл уже существует.Выберите другой емайл";
        }
    }

    private function validSex($sex) {
        if (!isset($sex)) {
            $this->errorData['sex'] = "Пол должен быть выбран!";
        }

        if ($sex !== 'male' && $sex !== 'female') {
            $this->errorData['sex'] = "Пол может быть только муж. или жен.";
        }
    }

    private function validNumberGroup($number) {
        if (!isset($number)) {
            $this->errorData['number_group'] = "Введите номер группы!";
        }

        if (!ctype_alnum($number)) {
            $this->errorData['number_group'] = "В названии группы разрешены только цифры и буквы!";
        }

        if (strlen($number) > 5) {
            $this->errorData['number_group'] = "Название группы не может больше 5 знаков!";
        }
    }


    private function validScore($score) {
        if (!isset($score)) {
            $this->errorData['score'] = "Введите баллы ЕГЭ!";
        }

        if ($score < 90) {
            $this->errorData['score'] = "Балл слишком мал. Попробуйте на следуйщий год";
        }
    }


    private function validDate($birthday) {
        if (!isset($birthday)) {
            $this->errorData['birthday'] = "Выберите дату рождения";
        }
        $date = explode('-', $birthday);

        if (!checkdate($date[1], $date[2], $date[0])) {
            $this->errorData['birthday'] = "Введите дату корректно";
        }
        if ($date[0] < 1910) {
            $this->errorData['birthday'] = "Ваш возраст слишком велик.";
        }
    }


    private function validCitizen($citizen) {
        if (!isset($citizen)) {
            $this->errorData['citizen'] = "Выберите где проживаете";
        }

        if ($citizen !== 'local' && $citizen !== 'no local') {
            $this->errorData['citizen'] = "Можно выбрать только из двух значений - житель города или иногородний";
        }
    }

    public function action_validate (): array
    {
        $data = $_POST;
        $this->validFirstName($data['first_name']);
        $this->validLastName($data['last_name']);
        $this->validEmail($data['email']);
        $this->validSex($data['sex']);
        $this->validDate($data['birthday']);
        $this->validScore($data['score']);
        $this->validCitizen($data['citizen']);
        $this->validNumberGroup($data['number_group']);
        $output['data'] = $data;
        $output['errors'] = $this->errorData;
        return $output;

    }
}
