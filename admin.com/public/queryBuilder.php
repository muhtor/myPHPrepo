<?php

class Query{
    public static function selectTable($table){
        $db = new PDO('mysql:host=localhost;dbname=admin', 'root', '');
        $statement = $db->query("SELECT * FROM $table");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

