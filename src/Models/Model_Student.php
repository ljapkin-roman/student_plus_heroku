<?php
namespace Summit\Models;
use Summit\Core\Model;

class Model_Student extends Model
{
    public function recordUser($data)
    {

        try {
            $sql = 'INSERT INTO students (first_name, last_name, number_group, gender, email, score_ege, birthday, citizen, session_id) VALUES (:first_name, :last_name, :number_group, :sex, :email, :score_ege, :birthday, :citizen,:session_id)';
            $statement = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $statement->execute(
            array(':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':sex' => $data['sex'],
                ':number_group' => $data['number_group'],
                ':email' => $data['email'],
                ':score_ege' => $data['score'],
                ':birthday' => $data['birthday'],
                ':citizen' => $data['citizen'],
                ':session_id' => $data['session_id']

            )
            );
        } catch (\PDOException $e) {
            //Do your error handling here
            $message = $e->getMessage();
            print_r($message);
        }
    }

    public function getAllUser(): bool
    {
        $sql = 'SELECT first_name, last_name, number_group, sex, email, score_ege, birthday, citizen FROM student';
        $allUser = $this->db->query($sql);
        return $allUser;
    }

    public function is_session_exist($session_id)  :bool
    {
        $sql = 'SELECT session_id FROM Students WHERE session_id = :session_id';
        $toCheck = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $toCheck->execute(array(':session_id' => $session_id));
        $result = $toCheck->fetchAll();
        if (!empty($result)) {
            return true;
        }
        return false;
    }

    public function redact_student($session_id)
    {
        print_r("I will redact user's data in database");
    }

     public function get_data_student($session_id) :array
     {
         $sql = 'SELECT * FROM Students WHERE session_id = :session_id';
         $toCheck = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
         $toCheck->execute(array(':session_id' => $session_id));
         $result = $toCheck->fetchAll();
         return $result;
     }
}