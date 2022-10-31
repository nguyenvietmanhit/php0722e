<?php
//models/Category.php
require_once 'models/Model.php';
class Category extends Model {

    public function insertData($name) {
        // B1:
        $sql_insert = "INSERT INTO categories(name) VALUES(:name)";
        // B2:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3:
        $inserts = [
            ':name' => $name
        ];
        // B4:
        return $obj_insert->execute($inserts);
    }
}