<?php
namespace Summit\Core;

class   Model
{
    public $db;

    public function __construct()
    {
        $json = file_get_contents(__DIR__ . '/Environment.json');
        $json_data = json_decode($json, true);
        $env = $json_data['db'];

        try {
            $this->db = new \PDO("pgsql:host={$env['host']};dbname={$env['dbname']};", "{$env['user']}", "{$env['password']}");
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOExpection $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function get_data()
    {
        $sql = 'SELECT * FROM Students';
        $toCheck = $this->db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $toCheck->execute();
        $result = $toCheck->fetchAll();
        print_r($result);
    }
}