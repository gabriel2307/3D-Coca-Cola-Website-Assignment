<?php


namespace app\core;


class Model
{
    public $tableName = '';

    function all() {
        $db = \app\core\Application::$app->db;
        $stmt = $db->pdo->prepare("SELECT * FROM $this->tableName");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}