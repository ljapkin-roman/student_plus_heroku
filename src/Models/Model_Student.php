<?php
namespace Summit\Models;
use Summit\Core\Model;

class Model_Student extends Model
{
    public function recordUser($data)
    {

        try {
            //$sql = 'INSERT INTO student (first_name, last_name, number_group, gender, email, score_ege, birthday, citizen) VALUES (:first_name, :last_name, :number_group, :sex, :email, :score_ege, :birthday, :citizen)';
            $sql = "INSERT INTO students (first_name, last_name, number_group, gender, email, score_ege, birthday, citizen) VALUES ('hachik', 'tortuga', 'ht78', 'male', 'hachik@gmail.com', 200, '1980-02-02', 'local')";
            $select_sql = "SELCT * FROM stud";
            $statement = $this->db->prepare($select_sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $statement->execute(
            /*
            array(':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':sex' => $data['sex'],
                ':number_group' => $data['number_group'],
                ':email' => $data['email'],
                ':score_ege' => $data['score'],
                ':birthday' => $data['birthday'],
                ':citizen' => $data['citizen']

            )*/
            );
            print_r("block try executed ");
        } catch (PDOException $e) {
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
}
