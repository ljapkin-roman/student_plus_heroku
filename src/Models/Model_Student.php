<?php

namespace Summit\Models;

use Summit\Core\Model;

class Model_Student extends Model
{
    public function recordUser($data)
    {
        try {
            $sql = 'INSERT INTO students (first_name, last_name, number_group, gender, email, score_ege, birthday, citizen, cookie_user) 
                    VALUES (:first_name, :last_name, :number_group, :sex, :email, :score_ege, :birthday, :citizen,:cookie_user)';
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
                ':cookie_user' => $data['cookie_user']

                )
            );
        } catch (\PDOException $e) {
            //Do your error handling here
            $message = $e->getMessage();
            print_r($message);
        }
    }

    public function getAllUser()
    {
        $sql = 'SELECT first_name, last_name, number_group, gender, email, score_ege, birthday, citizen FROM students;';
        $statement = $this->db->prepare($sql, array(\PDO::FETCH_ASSOC,\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function sliceList($sizeChunk = 30)
    {
        $enterList = $this->getAllUser();
        $resultDivide = array_chunk($enterList, $sizeChunk);
        return count($resultDivide);
    }
    public function is_session_exist($session_id): bool
    {
        $sql = 'SELECT cookie_user FROM Students WHERE cookie_user = :cookie_user';
        $toCheck = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $toCheck->execute(array(':cookie_user' => $session_id));
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

    public function get_data_student($session_id): array
    {
        $sql = 'SELECT * FROM Students WHERE cookie_user = :cookie_user';
        $toCheck = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $toCheck->execute(array(':cookie_user' => $session_id));
        $result = $toCheck->fetchAll();
        return $result;
    }

    public function getQuantityPage($pageSize): float
    {
        $sql = 'SELECT COUNT(*) FROM Students';
        $statement = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $statement->execute();
        $quantityPage = $statement->fetchAll()[0]['count'];
        return ceil($quantityPage / $pageSize);
    }

    public function getListStudent($offset, $blockend = 30): array
    {
        $sql = 'SELECT first_name, last_name, number_group FROM students OFFSET :offset LIMIT :limit;';
        $statement = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $statement->execute(array(':offset' => $offset, ':limit' => $blockend));
        return $statement->fetchAll();
    }
}
